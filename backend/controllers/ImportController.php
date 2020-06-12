<?php

namespace backend\controllers;

use backend\helpers\FileUploadHelper;
use backend\models\Country;
use backend\models\State;
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
}
