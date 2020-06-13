<?php

namespace backend\controllers;

use backend\helpers\FileUploadHelper;
use backend\models\Country;
use backend\models\Currency;
use backend\models\State;
use backend\models\University;
use backend\models\UniversityNextTo;
use lucasguo\import\components\Importer;
use lucasguo\import\exceptions\InvalidFileException;
use Yii;
use backend\models\Cities;
use backend\models\search\CitiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CitiesController implements the CRUD actions for Cities model.
 */
class ImportController extends BackendController
{
     public  $layout ='base';


    public function actionCountries(){
        $errors = '';
        $saved= false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => University::class,
                'scenario' => University::SCENARIO_IMPORT,
                'skipFirstRow' => true,
                'fields' => [
                    [
                        'attribute' => 'title',
                        'value' => function ($row) {
                            return strval($row[0]);
                        },
                    ],
                    [
                        'attribute' => 'code',
                        'value' => function ($row) {
                            return strval($row[1]);
                        },
                    ],
                    [
                        'attribute' => 'intro',
                        'value' => function ($row) {
                            return strval($row[2]);
                        },
                    ],

                    [
                        'attribute' => 'description',
                        'value' => function ($row) {
                            return strval($row[4]);
                        },
                    ],
                    [
                        'attribute' => 'detailed_address',
                        'value' => function ($row) {
                            return strval($row[5]);
                        },
                    ],
                    [
                        'attribute' => 'lat',
                        'value' => function ($row) {
                            return strval($row[6]);
                        },
                    ],
                    [
                        'attribute' => 'lng',
                        'value' => function ($row) {
                            return strval($row[7]);
                        },
                    ],
                    [
                        'attribute' => 'currency_id',
                        'value' => function ($row ) {
                            $currencyObj= Currency::find()->where(['currency_code'=>strval($row[8])])->one();
                            if($currencyObj){
                                return  $currencyObj->id ;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'next_to',
                        'value' => function ($row) {
                            $nextToObj= UniversityNextTo::find()->where(['title'=>strval($row[9])])->one();
                            if(!$nextToObj){
                                $nextToObj = new UniversityNextTo();
                                $nextToObj->title = strval($row[9]);
                                $nextToObj->save();
                            }
                            return  $nextToObj->id ;
                        },
                    ],

                ],

            ]);

            if (!$importer->validate()) {
                foreach($importer->getErrors() as $rowNumber => $errors) {
                    $errors .="$rowNumber errors <br>" . implode('<br>', $errors);
                }
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('hr', 'please check the attached file for errors -  '.$errors) ,
                    'title' =>'',
                ]);

            } else {

                if(! $importer->save()){
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'success',
                        'body' => \Yii::t('hr', 'please check the attached file for errors ') ,
                        'title' =>'',
                    ]);
                }else{
                    $saved= true;
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully') ,
                        'title' =>'',
                    ]);
                }

            }

        }

        return $this->render('form',['model'=>$model,
            'saved'=>$saved
        ]);
    }

    public function actionCountriddes(){
        $saved= false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');
            $importer = new Importer([
                'file' => $uploadFile,
                'modelClass' => Country::className(),
                'skipRowsCount' => 1, // description lines and header lines should be skipped
                'columnMappings' => [
                    [
                        'attribute' => 'title',
                        'required' => true, // if set this to true, the row that missing this value will be skipped. As in the example line 6 will be skipped
                    ],
                    [
                        'attribute' => 'code',
                        'required' => true,
                    ],
                    'intro',

//                                        [
//                                            'attribute' => 'status',
//                                            'translation' => function($orgValue, $rowData) {
//                                                return array_search($orgValue, Post::getStatusList());
//                                            }, // this function help fill the status like '0' instead of 'New'
//                                        ],
                    'details',
                    [
                        'attribute' => 'state',
                        'required' => true,
                    ],
                    [
                        'attribute' => 'city',
                        'required' => true,
                    ],
                ],
                'validateWhenImport' => true, //if set this attribute to true, importer will help you validate the models and report the validation errors by $importer->validationErrors
            ]);

            try {
                $countries = $importer->import();

                Yii::$app->session->setFlash("success", count($importer->getImportRows()) . ' rows had been imported');
               if( count ($importer->getValidationErrors() )){
                   foreach ($importer->getValidationErrors() as $lineno => $errors) {
                       foreach ($errors as $attribute => $errorMessages) {
                           $error = $errorMessages[0];
                           break;
                       }
                       Yii::$app->session->addFlash("error", 'Line ' . $lineno . ' has error: ' . $error);
                   }
                   Yii::$app->getSession()->setFlash('alert', [
                       'type' =>'success',
                       'body' => \Yii::t('hr', 'please check the attached file gor errors ') ,
                       'title' =>'',
                   ]);
               }else{
                   //delete all countries
                   foreach ($countries as $country) {
                   //save country
                     $countryObj = Country::find()->where(['code'=>$country->code])->one();
                     if(!$countryObj){
                         $countryObj = new Country();
                         $countryObj->title = $country->title;
                         $countryObj->code = $country->code;
                         $countryObj->status =1;
                         $countryObj->intro = $country->intro;
                         $countryObj->details = $country->details;
                         if(!$countryObj->save()){
                             var_dump($countryObj->errors); die;
                         }
                     }

                     //save state
                       $stateObj = State::find()->where(['country_id'=>$countryObj->id,'title'=>$country->state])->one();
                       if(!$stateObj){
                       $stateObj = new State();
                       $stateObj->title = $country->state;
                       $stateObj->country_id = $countryObj->id;
                           if(!$stateObj->save()){
                               var_dump($stateObj->errors); die;
                           }
                       }

                       //save state
                       $cityObj = Cities::find()->where(['state_id'=>$stateObj->id,'title'=>$country->city])->one();
                       if(!$cityObj){
                           $cityObj = new Cities();
                           $cityObj->title = $country->city;
                           $cityObj->state_id = $stateObj->id;
                           if(!$cityObj->save()){
                               var_dump($cityObj->errors); die;
                           }
                       }


                   }
                   Yii::$app->getSession()->setFlash('alert', [
                       'type' =>'success',
                       'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                       'title' =>'',
                   ]);
                   $saved= true;
               }



            } catch (InvalidFileException $e) {
                $model->addError('file', 'Invalid import file.');
            }
        }

        return $this->render('form',['model'=>$model,
            'saved'=>$saved
        ]);
    }


    public function actionUniversities(){
        $errors = '';
        $saved= false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => University::class,
                'scenario' => University::SCENARIO_IMPORT,
                'skipFirstRow' => true,
                'fields' => [
                    [
                        'attribute' => 'title',
                        'value' => function ($row) {
                            return strval($row[0]);
                        },
                    ],
                    [
                        'attribute' => 'country_id',
                        'value' => function ($row) {
                            $countryObj= Country::find()->where(['code'=>strval($row[1])])->one();
                            if($countryObj){
                                return  $countryObj->id ;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'state_id',
                        'value' => function ($row) {
                            $stateObj= State::find()->where(['title'=>strval($row[2])])->one();
                            if($stateObj){
                                return  $stateObj->id ;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'city_id',
                        'value' => function ($row) {
                            $cityObj= Cities::find()->where(['title'=>strval($row[3])])->one();
                            if($cityObj){
                                return  $cityObj->id ;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'description',
                        'value' => function ($row) {
                            return strval($row[4]);
                        },
                    ],
                    [
                        'attribute' => 'detailed_address',
                        'value' => function ($row) {
                            return strval($row[5]);
                        },
                    ],
                    [
                        'attribute' => 'lat',
                            'value' => function ($row) {
                                return strval($row[6]);
                            },
                    ],
                    [
                        'attribute' => 'lng',
                        'value' => function ($row) {
                            return strval($row[7]);
                        },
                    ],
                    [
                        'attribute' => 'currency_id',
                        'value' => function ($row ) {
                            $currencyObj= Currency::find()->where(['currency_code'=>strval($row[8])])->one();
                            if($currencyObj){
                                return  $currencyObj->id ;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'next_to',
                        'value' => function ($row) {
                            $nextToObj= UniversityNextTo::find()->where(['title'=>strval($row[9])])->one();
                            if(!$nextToObj){
                                $nextToObj = new UniversityNextTo();
                                $nextToObj->title = strval($row[9]);
                                $nextToObj->save();
                            }
                            return  $nextToObj->id ;
                        },
                    ],

//                    [
//                        'attribute' => 'country',
//                        'value' => function ($row) {
//                            return strval($row[4]);
//                        },
//                    ],

//                    [
//                        'attribute' => 'photos',
//                        'value' => function ($row) {
//                            $photos = [];
//                            foreach (StringHelper::explode(strval($row[11]), ',', true, true) as $photo) {
//                                if (filter_var($photo, FILTER_VALIDATE_URL)) {
//                                    $file = @file_get_contents($photo);
//                                    if ($file) {
//                                        $filename = md5($file) . '.jpg';
//                                        file_put_contents(Yii::getAlias("@webroot/gallery/$filename"), $file);
//                                        $photos[] = $filename;
//                                    }
//                                } else {
//                                    $photos[] = $photo;
//                                }
//                            }
//
//                            return implode(',', $photos);
//                        }
//                    ],

                ],

            ]);

            if (!$importer->validate()) {
                foreach($importer->getErrors() as $rowNumber => $errors) {
                   $errors .="$rowNumber errors <br>" . implode('<br>', $errors);
                }
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('hr', 'please check the attached file for errors -  '.$errors) ,
                    'title' =>'',
                ]);

            } else {

               if(! $importer->save()){
                   Yii::$app->getSession()->setFlash('alert', [
                       'type' =>'success',
                       'body' => \Yii::t('hr', 'please check the attached file for errors ') ,
                       'title' =>'',
                   ]);
               }else{
                   $saved= true;
                   Yii::$app->getSession()->setFlash('alert', [
                       'type' =>'success',
                       'body' => \Yii::t('hr', 'Data has been imported successfully') ,
                       'title' =>'',
                   ]);
               }

            }

        }

        return $this->render('form',['model'=>$model,
            'saved'=>$saved
        ]);
    }
}
