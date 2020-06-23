<?php

namespace backend\controllers;

use backend\helpers\FileUploadHelper;
use backend\models\Country;
use backend\models\Currency;
use backend\models\State;
use backend\models\University;
use backend\models\UniversityLangOfStudy;
use backend\models\UniversityNextTo;
use backend\models\UniversityProgramDegree;
use backend\models\UniversityProgrameConditionalAdmission;
use backend\models\UniversityProgrameFormat;
use backend\models\UniversityProgrameIlets;
use backend\models\UniversityProgrameMethodOfStudy;
use backend\models\UniversityProgramField;
use backend\models\UniversityProgramMajors;
use backend\models\UniversityProgramMediumOfStudy;
use backend\models\UniversityPrograms;
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


    public function actionStatesCities(){
        $errors = '';
        $saved= false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => Cities::class,
                'scenario' => Cities::SCENARIO_IMPORT,
                'skipFirstRow' => true,
                'fields' => [
                    [
                        'attribute' => 'country',
                        'value' => function ($row) {
                            return strval($row[0]);
                        },
                    ],
                    [
                        'attribute' => 'state_id',
                        'value' => function ($row) {
                            $country= Country::find()->where(['code'=>strval($row[0])])->one();
                            if($country){
                                $stateObj= State::find()->where(['title'=>strval($row[1]) ,'country_id'=>$country->id])->one();
                                if(!$stateObj){
                                    $stateObj = new State();
                                    $stateObj->title = strval($row[1]);
                                    $stateObj->country_id = $country->id;
                                    $stateObj->save();
                                }

                                return $stateObj->id;

                            }else{
                                return '';
                            }
                        },
                    ],
                    [
                        'attribute' => 'title',
                        'value' => function ($row) {
                            return strval($row[2]);
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
            'saved'=>$saved,
            'filename'=>'State-Cities.xlsx'
        ]);
    }

    public function actionCountries(){
        $errors = '';
        $saved= false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => Country::class,
                'scenario' => Country::SCENARIO_IMPORT,
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
                        'attribute' => 'details',
                        'value' => function ($row) {
                            return strval($row[3]);
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
            'saved'=>$saved,
            'filename'=>'Countries.xlsx'

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
                        'attribute' => 'title_ar',
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
                        'attribute' => 'description_ar',
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

                //    [
                //        'attribute' => 'country',
                //        'value' => function ($row) {
                //            return strval($row[4]);
                //        },
                //    ],

                //    [
                //        'attribute' => 'photos',
                //        'value' => function ($row) {
                //            $photos = [];
                //            foreach (StringHelper::explode(strval($row[11]), ',', true, true) as $photo) {
                //                if (filter_var($photo, FILTER_VALIDATE_URL)) {
                //                    $file = @file_get_contents($photo);
                //                    if ($file) {
                //                        $filename = md5($file) . '.jpg';
                //                        file_put_contents(Yii::getAlias("@webroot/gallery/$filename"), $file);
                //                        $photos[] = $filename;
                //                    }
                //                } else {
                //                    $photos[] = $photo;
                //                }
                //            }

                //            return implode(',', $photos);
                //        }
                //    ],

                ],

            ]);

            // return var_dump($importer->getModels());
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
        return var_dump('done');
        return $this->render('form',['model'=>$model,
            'saved'=>$saved,
            'filename'=>'Universities.xlsx'

        ]);
    }

    public function actionUniversitiesPrograms($university_id){
        if(isset($_REQUEST['university_id'])){
            Yii::$app->session->set('universityId',$_REQUEST['university_id']);
        }
        $errors = '';
        $saved= false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => UniversityPrograms::class,
                'scenario' => UniversityPrograms::SCENARIO_IMPORT,
                'skipFirstRow' => true,
                'fields' => [
                    [
                        'attribute' => 'university_id',
                        'value' => function ($row) {
                            return Yii::$app->session->get('universityId');
                        },
                    ],
                    [
                        'attribute' => 'title',
                        'value' => function ($row) {
                            return strval($row[0]);
                        },
                    ],
                    [
                        'attribute' => 'lang_of_study',
                        'value' => function ($row) {
                            $langObj= UniversityLangOfStudy::find()->where(['title'=>strval($row[1])])->one();
                            if(!$langObj){
                                $langObj = new UniversityLangOfStudy();
                                $langObj->title = strval($row[1]);
                                $langObj->save();
                            }
                            return  $langObj->id ;
                        },
                    ],
                    [
                        'attribute' => 'major_id',
                        'value' => function ($row) {
                            $majorObj= UniversityProgramMajors::find()->where(['title'=>strval($row[2])])->one();
                            if(!$majorObj){
                                $majorObj = new UniversityProgramMajors();
                                $majorObj->title = strval($row[2]);
                                $majorObj->save();
                            }
                            return  $majorObj->id ;
                        },
                    ],
                    [
                        'attribute' => 'medium_of_study',
                        'value' => function ($row) {
                            $medumObj= UniversityProgramMediumOfStudy::find()->where(['title'=>strval($row[3])])->one();
                            if(!$medumObj){
                                $medumObj = new UniversityProgramMediumOfStudy();
                                $medumObj->title = strval($row[3]);
                                $medumObj->save();
                            }
                            return  $medumObj->id ;
                        },
                    ],
                    [
                        'attribute' => 'degree_id',
                        'value' => function ($row) {
                            $degreeObj= UniversityProgramDegree::find()->where(['title'=>strval($row[4])])->one();
                            if(!$degreeObj){
                                $degreeObj = new UniversityProgramDegree();
                                $degreeObj->title = strval($row[4]);
                                $degreeObj->save();
                            }
                            return  $degreeObj->id ;
                        },
                    ],

                    [
                        'attribute' => 'field_id',
                        'value' => function ($row) {
                            $fieldObj= UniversityProgramField::find()->where(['title'=>strval($row[5])])->one();
                            if(!$fieldObj){
                                $fieldObj = new UniversityProgramField();
                                $fieldObj->title = strval($row[5]);
                                $fieldObj->save();
                            }
                            return  $fieldObj->id ;
                        },
                    ],

                    [
                        'attribute' => 'study_duration_no',
                        'value' => function ($row) {
                            return strval($row[6]);
                        },
                    ],
                     [
                        'attribute' => 'study_duration',
                        'value' => function ($row) {

                            if(strval($row[7]) == 'Day' ){
                                return  1 ;
                            }
                            if(strval($row[7]) == 'Week' ){
                                return  2 ;
                            }
                            if(strval($row[7]) == 'Month' ){
                                return  3 ;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'first_submission_date',
                        'value' => function ($row) {
                            return strval($row[8]);
                        },
                    ],
                    [
                        'attribute' => 'first_submission_date_active',
                        'value' => function ($row) {
                            return strval($row[9])=="Yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'last_submission_date',
                        'value' => function ($row) {
                            return strval($row[10]);
                        },
                    ],
                    [
                        'attribute' => 'last_submission_date_active',
                        'value' => function ($row) {
                            return strval($row[11])=="Yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'study_method',
                        'value' => function ($row ) {
                            $studyObj= UniversityProgrameMethodOfStudy::find()->where(['title'=>strval($row[12])])->one();
                            if(!$studyObj){
                                $studyObj = new UniversityProgrameMethodOfStudy();
                                $studyObj->title = strval($row[12]);
                                $studyObj->save();
                            }
                            return  $studyObj->id ;
                        },
                    ],
                    [
                        'attribute' => 'program_format',
                        'value' => function ($row) {
                            $progformatObj= UniversityProgrameFormat::find()->where(['title'=>strval($row[13])])->one();
                            if(!$progformatObj){
                                $progformatObj = new UniversityProgrameFormat();
                                $progformatObj->title = strval($row[13]);
                                $progformatObj->save();
                            }
                            return  $progformatObj->id ;
                        },
                    ],

                    [
                        'attribute' => 'conditional_admissions',
                        'value' => function ($row) {
                            $admissionObj= UniversityProgrameConditionalAdmission::find()->where(['title'=>strval($row[14])])->one();
                            if(!$admissionObj){
                                $admissionObj = new UniversityProgrameConditionalAdmission();
                                $admissionObj->title = strval($row[14]);
                                $admissionObj->save();
                            }
                            return  $admissionObj->id ;
                        },
                    ],


                    [
                        'attribute' => 'ielts',
                        'value' => function ($row) {
                            $iletsObj= UniversityProgrameIlets::find()->where(['title'=>strval($row[15])])->one();
                            if(!$iletsObj){
                                $iletsObj = new UniversityProgrameIlets();
                                $iletsObj->title = strval($row[15]);
                                $iletsObj->save();
                            }
                            return  $iletsObj->id ;
                        },
                    ],

                    [
                        'attribute' => 'bank_statment',
                        'value' => function ($row) {
                            return strval($row[16]);
                        },
                    ],
                    [
                        'attribute' => 'annual_cost',
                        'value' => function ($row) {
                            return strval($row[17]);
                        },
                    ],
                    [
                        'attribute' => 'toefl',
                        'value' => function ($row) {
                            return strval($row[18]);
                        },
                    ],
                    [
                        'attribute' => 'high_school_transcript',
                        'value' => function ($row) {
                            return strval($row[19]);
                        },
                    ],
                    [
                        'attribute' => 'bachelor_degree',
                        'value' => function ($row) {
                            return strval($row[20]);
                        },
                    ],
                    [
                        'attribute' => 'note1',
                        'value' => function ($row) {
                            return strval($row[21]);
                        },
                    ],
                    [
                        'attribute' => 'note2',
                        'value' => function ($row) {
                            return strval($row[22]);
                        },
                    ],

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
                        'type' =>'error',
                        'body' => \Yii::t('hr', 'please check the attached file for errors ') ,
                        'title' =>'',
                    ]);
                }else{

                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully') ,
                        'title' =>'',
                    ]);
                    $saved= true;
                }

            }

        }

        return $this->render('form',['model'=>$model,
            'saved'=>$saved,
            'filename'=>'Universitie-Programs.xlsx'

        ]);
    }

}
