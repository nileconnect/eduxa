<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\State;
use yii\web\UploadedFile;
use backend\models\Cities;
use backend\models\Country;
use backend\models\Schools;
use backend\models\Currency;
use backend\models\University;
use backend\models\SchoolCourse;
use backend\models\SchoolNextTo;
use backend\models\SchoolCourseType;
use backend\models\UniversityNextTo;
use backend\helpers\FileUploadHelper;
use backend\models\UniversityPrograms;
use lucasguo\import\components\Importer;
use backend\models\UniversityLangOfStudy;
use backend\models\UniversityProgramField;
use backend\models\UniversityProgramDegree;
use backend\models\UniversityProgrameIlets;
use backend\models\UniversityProgramMajors;
use backend\models\UniversityProgStartdate;
use backend\models\UniversityProgrameFormat;
use backend\models\SchoolCourseStudyLanguage;
use backend\models\UniversityProgramMediumOfStudy;
use backend\models\UniversityProgrameMethodOfStudy;
use backend\models\UniversityProgrameConditionalAdmission;

/**
 * CitiesController implements the CRUD actions for Cities model.
 */
class ImportController extends BackendController
{
    public $layout = 'base';

    public function actionStatesCities()
    {
        $errors = '';
        $saved = false;
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
                            $country = Country::find()->where(['code' => strval($row[0])])->one();
                            if ($country) {
                                $stateObj = State::find()->where(['title' => strval($row[1]), 'country_id' => $country->id])->one();
                                if (!$stateObj) {
                                    $stateObj = new State();
                                    $stateObj->title = strval($row[1]);
                                    $stateObj->title_ar = strval($row[2]);
                                    $stateObj->country_id = $country->id;
                                    $stateObj->slug = str_replace(' ', '-', strval($row[1]));
                                    $stateObj->save(false);
                                }
                                return $stateObj->id;
                            } else {
                                return '';
                            }
                        },
                    ],
                    [
                        'attribute' => 'title',
                        'value' => function ($row) {
                            return strval($row[3]);
                        },
                    ],
                    [
                        'attribute' => 'title_ar',
                        'value' => function ($row) {
                            return strval($row[4]);
                        },
                    ],

                ],

            ]);

            if (!$importer->validate()) {
                // foreach ($importer->getErrors() as $rowNumber => $errors) {
                //     $errors .= "$rowNumber errors <br>" . implode('<br>', $errors);
                // }
                // // Yii::$app->getSession()->setFlash('alert', [
                // //     'type' => 'warning',
                // //     'body' => \Yii::t('hr', 'please check the attached file for errors -  ' . $errors),
                // //     'title' => '',
                // // ]);
            } else {
                if (!$importer->save()) {
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'please check the attached file for errors '),
                        'title' => '',
                    ]);
                } else {
                    $saved = true;
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully, count imported ( ' . count($importer->getModels()) . ' )'),
                        'title' => '',
                    ]);
                }
            }
        }

        return $this->render('form', ['model' => $model,
            'importer'=>$importer,
            'saved' => $saved,
            'filename' => 'State-Cities.xlsx',
        ]);
    }

    public function actionCountries()
    {
        $errors = '';
        $saved = false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => Country::class,
                'scenario' => 'import',
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
                            return strval($row[1]);
                        },
                    ],

                    [
                        'attribute' => 'code',
                        'value' => function ($row) {
                            return strval($row[2]);
                        },
                    ],

                    [
                        'attribute' => 'intro',
                        'value' => function ($row) {
                            return strval($row[3]);
                        },
                    ],
                    [
                        'attribute' => 'intro_ar',
                        'value' => function ($row) {
                            return strval($row[4]);
                        },
                    ],

                    [
                        'attribute' => 'details',
                        'value' => function ($row) {
                            return strval($row[5]);
                        },
                    ],
                    [
                        'attribute' => 'details_ar',
                        'value' => function ($row) {
                            return strval($row[6]);
                        },
                    ],
                ],

            ]);
            // return var_dump( $importer->getModels());
            if (!$importer->validate()) {
                // foreach ($importer->getErrors() as $rowNumber => $errors) {
                //     $errors .= "$rowNumber errors <br>" . implode('<br>', $errors);
                // }
                // // Yii::$app->getSession()->setFlash('alert', [
                // //     'type' => 'warning',
                // //     'body' => \Yii::t('hr', 'please check the attached file for errors -  ' . $errors),
                // //     'title' => '',
                // // ]);
            } else {
                if (!$importer->save()) {
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'please check the attached file for errors '),
                        'title' => '',
                    ]);
                } else {
                    $saved = true;
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully, count imported ( ' . count($importer->getModels()) . ' )'),
                        'title' => '',
                    ]);
                }
            }
        }

        return $this->render('form', ['model' => $model,
            'importer'=>$importer,
            'saved' => $saved,
            'filename' => 'Countries.xlsx',

        ]);
    }

    public function actionUniversities()
    {
        $errors = '';
        $saved = false;
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
                            return strval($row[1]);
                        },
                    ],
                    [
                        'attribute' => 'country_id',
                        'value' => function ($row) {
                            $countryObj = Country::find()->where(['code' => strval($row[2])])->one();
                            if ($countryObj) {
                                return $countryObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'state_id',
                        'value' => function ($row) {
                            $stateObj = State::find()->where(['title' => strval($row[3])])->one();
                            if ($stateObj) {
                                return $stateObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'city_id',
                        'value' => function ($row) {
                            $cityObj = Cities::find()->where(['title' => strval($row[4])])->one();
                            if ($cityObj) {
                                return $cityObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'description',
                        'value' => function ($row) {
                            return strval($row[5]);
                        },
                    ],
                    [
                        'attribute' => 'description_ar',
                        'value' => function ($row) {
                            return strval($row[6]);
                        },
                    ],
                    [
                        'attribute' => 'detailed_address',
                        'value' => function ($row) {
                            return strval($row[7]);
                        },
                    ],
                    [
                        'attribute' => 'detailed_address_ar',
                        'value' => function ($row) {
                            return strval($row[8]);
                        },
                    ],
                    [
                        'attribute' => 'lat',
                        'value' => function ($row) {
                            return strval($row[9]);
                        },
                    ],
                    [
                        'attribute' => 'lng',
                        'value' => function ($row) {
                            return strval($row[10]);
                        },
                    ],
                    [
                        'attribute' => 'currency_id',
                        'value' => function ($row) {
                            $currencyObj = Currency::find()->where(['currency_code' => strval($row[11])])->one();
                            if ($currencyObj) {
                                return $currencyObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'next_to',
                        'value' => function ($row) {
                            $nextToObj = UniversityNextTo::find()->where(['title' => strval($row[12])])->one();
                            if (!$nextToObj) {
                                $nextToObj = new UniversityNextTo();
                                $nextToObj->title = strval($row[12]);
                                $nextToObj->save();
                            }
                            return $nextToObj->id;
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($row) {
                            return strval($row[13]) == "Yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'recommended',
                        'value' => function ($row) {
                            return strval($row[14]) == "Yes" ? 1 : 0;
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
                // foreach ($importer->getErrors() as $rowNumber => $errors) {
                //     $errors .= "$rowNumber errors <br>" . implode('<br>', $errors);
                // }
                // // Yii::$app->getSession()->setFlash('alert', [
                // //     'type' => 'warning',
                // //     'body' => \Yii::t('hr', 'please check the attached file for errors -  ' . $errors),
                // //     'title' => '',
                // // ]);
            } else {
                if (!$importer->save()) {
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'please check the attached file for errors '),
                        'title' => '',
                    ]);
                } else {
                    $saved = true;
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully, count imported ( ' . count($importer->getModels()) . ' )'),
                        'title' => '',
                    ]);
                }
            }
        }
        return $this->render('form', ['model' => $model,
            'importer'=>$importer,
            'saved' => $saved,
            'filename' => 'Universities.xlsx',
        ]);
    }

    public function actionUniversitiesPrograms($university_id)
    {
        if (isset($_REQUEST['university_id'])) {
            Yii::$app->session->set('universityId', $_REQUEST['university_id']);
        }
        $errors = '';
        $saved = false;
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
                        'attribute' => 'title_ar',
                        'value' => function ($row) {
                            return strval($row[1]);
                        },
                    ],
                    [
                        'attribute' => 'lang_of_study',
                        'value' => function ($row) {
                            $langObj = UniversityLangOfStudy::find()->where(['title' => strval($row[2])])->one();
                            if (!$langObj) {
                                $langObj = new UniversityLangOfStudy();
                                $langObj->title = strval($row[2]);
                                $langObj->save();
                            }
                            return $langObj->id;
                        },
                    ],
                    [
                        'attribute' => 'major_id',
                        'value' => function ($row) {
                            $majorObj = UniversityProgramMajors::find()->where(['title' => strval($row[3])])->one();
                            if (!$majorObj) {
                                $majorObj = new UniversityProgramMajors();
                                $majorObj->title = strval($row[3]);
                                $majorObj->save();
                            }
                            return $majorObj->id;
                        },
                    ],
                    [
                        'attribute' => 'medium_of_study',
                        'value' => function ($row) {
                            $medumObj = UniversityProgramMediumOfStudy::find()->where(['title' => strval($row[4])])->one();
                            if (!$medumObj) {
                                $medumObj = new UniversityProgramMediumOfStudy();
                                $medumObj->title = strval($row[4]);
                                $medumObj->save();
                            }
                            return $medumObj->id;
                        },
                    ],
                    [
                        'attribute' => 'degree_id',
                        'value' => function ($row) {
                            $degreeObj = UniversityProgramDegree::find()->where(['title' => strval($row[5])])->one();
                            if (!$degreeObj) {
                                $degreeObj = new UniversityProgramDegree();
                                $degreeObj->title = strval($row[5]);
                                $degreeObj->save();
                            }
                            return $degreeObj->id;
                        },
                    ],

                    [
                        'attribute' => 'field_id',
                        'value' => function ($row) {
                            $fieldObj = UniversityProgramField::find()->where(['title' => strval($row[6])])->one();
                            if (!$fieldObj) {
                                $fieldObj = new UniversityProgramField();
                                $fieldObj->title = strval($row[6]);
                                $fieldObj->save();
                            }
                            return $fieldObj->id;
                        },
                    ],

                    [
                        'attribute' => 'study_duration_no',
                        'value' => function ($row) {
                            return strval($row[7]);
                        },
                    ],
                    [
                        'attribute' => 'study_duration',
                        'value' => function ($row) {
                            if (strval($row[8]) == 'Day') {
                                return 1;
                            }
                            if (strval($row[8]) == 'Week') {
                                return 2;
                            }
                            if (strval($row[8]) == 'Month') {
                                return 3;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'first_submission_date',
                        'value' => function ($row) {
                            return strval($row[9]);
                        },
                    ],
                    [
                        'attribute' => 'first_submission_date_active',
                        'value' => function ($row) {
                            return strtolower(strval($row[10])) == "yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'last_submission_date',
                        'value' => function ($row) {
                            return strval($row[11]);
                        },
                    ],
                    [
                        'attribute' => 'last_submission_date_active',
                        'value' => function ($row) {
                            return strtolower(strval($row[12])) == "yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'study_method',
                        'value' => function ($row) {
                            $studyObj = UniversityProgrameMethodOfStudy::find()->where(['title' => strval($row[13])])->one();
                            if (!$studyObj) {
                                $studyObj = new UniversityProgrameMethodOfStudy();
                                $studyObj->title = strval($row[13]);
                                $studyObj->save();
                            }
                            return $studyObj->id;
                        },
                    ],
                    [
                        'attribute' => 'program_format',
                        'value' => function ($row) {
                            $progformatObj = UniversityProgrameFormat::find()->where(['title' => strval($row[14])])->one();
                            if (!$progformatObj) {
                                $progformatObj = new UniversityProgrameFormat();
                                $progformatObj->title = strval($row[14]);
                                $progformatObj->save();
                            }
                            return $progformatObj->id;
                        },
                    ],

                    [
                        'attribute' => 'conditional_admissions',
                        'value' => function ($row) {
                            $admissionObj = UniversityProgrameConditionalAdmission::find()->where(['title' => strval($row[15])])->one();
                            if (!$admissionObj) {
                                $admissionObj = new UniversityProgrameConditionalAdmission();
                                $admissionObj->title = strval($row[15]);
                                $admissionObj->save();
                            }
                            return $admissionObj->id;
                        },
                    ],

                    [
                        'attribute' => 'ielts',
                        'value' => function ($row) {
                            $iletsObj = UniversityProgrameIlets::find()->where(['title' => strval($row[16])])->one();
                            if (!$iletsObj) {
                                $iletsObj = new UniversityProgrameIlets();
                                $iletsObj->title = strval($row[16]);
                                $iletsObj->save();
                            }
                            return $iletsObj->id;
                        },
                    ],

                    [
                        'attribute' => 'bank_statment',
                        'value' => function ($row) {
                            return strval($row[17]);
                        },
                    ],
                    [
                        'attribute' => 'annual_cost',
                        'value' => function ($row) {
                            return strval($row[18]);
                        },
                    ],
                    [
                        'attribute' => 'toefl',
                        'value' => function ($row) {
                            return strval($row[19]);
                        },
                    ],
                    [
                        'attribute' => 'high_school_transcript',
                        'value' => function ($row) {
                            return strval($row[20]);
                        },
                    ],
                    [
                        'attribute' => 'high_school_transcript_ar',
                        'value' => function ($row) {
                            return strval($row[21]);
                        },
                    ],
                    [
                        'attribute' => 'bachelor_degree',
                        'value' => function ($row) {
                            return strval($row[22]);
                        },
                    ],
                    [
                        'attribute' => 'bachelor_degree_ar',
                        'value' => function ($row) {
                            return strval($row[23]);
                        },
                    ],
                    [
                        'attribute' => 'note1',
                        'value' => function ($row) {
                            return strval($row[24]);
                        },
                    ],
                    [
                        'attribute' => 'note1_ar',
                        'value' => function ($row) {
                            return strval($row[25]);
                        },
                    ],
                    [
                        'attribute' => 'note2',
                        'value' => function ($row) {
                            return strval($row[26]);
                        },
                    ],
                    [
                        'attribute' => 'note2_ar',
                        'value' => function ($row) {
                            return strval($row[27]);
                        },
                    ],
                    [
                        'attribute' => 'dates',
                        'value' => function ($row) {
                            return strval($row[28]);
                        },
                    ],

                ],
            ]);
            if (!$importer->validate()) {
                // foreach ($importer->getErrors() as $rowNumber => $errors) {
                //     $errors .= "$rowNumber errors <br>" . implode('<br>', $errors);
                // }
                // // Yii::$app->getSession()->setFlash('alert', [
                // //     'type' => 'warning',
                // //     'body' => \Yii::t('hr', 'please check the attached file for errors -  ' . $errors),
                // //     'title' => '',
                // // ]);
            } else {
                if (!$importer->save()) {

                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'error',
                        'body' => \Yii::t('hr', 'please check the attached file for errors '),
                        'title' => '',
                    ]);
                } else {
                    $savedPrograms = $importer->getModels();
                    foreach ($savedPrograms as $program) {
                        $this->checkDates($program);
                    }

                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully, count imported ( ' . count($importer->getModels()) . ' )'),
                        'title' => '',
                    ]);
                    $saved = true;
                }
            }
        }

        return $this->render('form', ['model' => $model,
            'importer'=>$importer,
            'saved' => $saved,
            'filename' => 'Universitie-Programs.xlsx',

        ]);
    }

    public function checkDates($program)
    {
        $startData = new UniversityProgStartdate();
        $startData->university_prog_id = $program->id;

        $dates = array_map(function($value){
            return ucfirst(strtolower(trim($value)));
        }, explode(',', $program->dates));

        if (in_array('Jan', $dates)) {
            $startData->m_1 = 1; 
        }
        if (in_array('Feb', $dates)) {
            $startData->m_2 = 1; 
        }
        if (in_array('Mar', $dates)) {
            $startData->m_3 = 1; 
        }
        if (in_array('Apr', $dates)) {
            $startData->m_4 = 1; 
        }
        if (in_array('May', $dates)) {
            $startData->m_5 = 1; 
        }
        if (in_array('Jun', $dates)) {
            $startData->m_6 = 1; 
        }
        if (in_array('Jul', $dates)) {
            $startData->m_7 = 1; 
        }
        if (in_array('Aug', $dates)) {
            $startData->m_8 = 1; 
        }
        if (in_array('Sept', $dates) || in_array('Sep', $dates)) {
            $startData->m_9 = 1; 
        }
        if (in_array('Oct', $dates)) {
            $startData->m_10 = 1; 
        }
        if (in_array('Nov', $dates)) {
            $startData->m_11 = 1; 
        }
        if (in_array('Dec', $dates)) {
            $startData->m_12 = 1; 
        }
        $startData->save(false);
        // return var_dump($dates,$startData,$startData->save(false),$startData->errors);
    }

    public function actionSchools()
    {
        $errors = '';
        $saved = false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => Schools::class,
                'scenario' => Schools::SCENARIO_IMPORT,
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
                            return strval($row[1]);
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($row) {
                            if (strval($row[2]) == "Yes" || strval($row[2]) == "yes") {
                                return 1;
                            } elseif (strval($row[2]) == "No" || strval($row[2]) == "no") {
                                return 0;
                            }
                            return 'NotValid';
                        },
                    ],
                    [
                        'attribute' => 'featured',
                        'value' => function ($row) {
                            if (strval($row[3]) == "Yes" || strval($row[3]) == "yes") {
                                return 1;
                            } elseif (strval($row[3]) == "No" || strval($row[3]) == "no") {
                                return 0;
                            }
                            return 'NotValid';
                        },
                    ],
                    [
                        'attribute' => 'country_id',
                        'value' => function ($row) {
                            $countryObj = Country::find()->where(['code' => strval($row[4])])->one();
                            if ($countryObj) {
                                return $countryObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'state_id',
                        'value' => function ($row) {
                            $stateObj = State::find()->where(['title' => strval($row[5])])->one();
                            if ($stateObj) {
                                return $stateObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'city_id',
                        'value' => function ($row) {
                            $cityObj = Cities::find()->where(['title' => strval($row[6])])->one();
                            if ($cityObj) {
                                return $cityObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'details',
                        'value' => function ($row) {
                            return strval($row[7]);
                        },
                    ],
                    [
                        'attribute' => 'details_ar',
                        'value' => function ($row) {
                            return strval($row[8]);
                        },
                    ],
                    [
                        'attribute' => 'detailed_address',
                        'value' => function ($row) {
                            return strval($row[9]);
                        },
                    ],
                    [
                        'attribute' => 'detailed_address_ar',
                        'value' => function ($row) {
                            return strval($row[10]);
                        },
                    ],
                    // [
                    //     'attribute' => 'location',
                    //     'value' => function ($row) {
                    //         return strval($row[11]);
                    //     },
                    // ],
                    [
                        'attribute' => 'lat',
                        'value' => function ($row) {
                            return strval($row[11]);
                        },
                    ],
                    [
                        'attribute' => 'lng',
                        'value' => function ($row) {
                            return strval($row[12]);
                        },
                    ],
                    [
                        'attribute' => 'currency_id',
                        'value' => function ($row) {
                            $currencyObj = Currency::find()->where(['currency_code' => strval($row[13])])->one();
                            if ($currencyObj) {
                                return $currencyObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'next_to',
                        'value' => function ($row) {
                            $nextToObj = SchoolNextTo::find()->where(['title' => strval($row[14])])->one();
                            if (!$nextToObj) {
                                $nextToObj = new SchoolNextTo();
                                $nextToObj->title = strval($row[14]);
                                $nextToObj->save();
                            }
                            return $nextToObj->id;
                        },
                    ],
                    [
                        'attribute' => 'has_health_insurance',
                        'value' => function ($row) {
                            return strval($row[15]) == "Yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'health_insurance_cost',
                        'value' => function ($row) {
                            return strval($row[16]);
                        },
                    ],
                ],

            ]);
            // return var_dump($importer->getModels());
            if (!$importer->validate()) {
                // foreach ($importer->getErrors() as $rowNumber => $errors) {
                //     $errors .= "$rowNumber errors <br>" . implode('<br>', $errors);
                // }
                // // Yii::$app->getSession()->setFlash('alert', [
                // //     'type' => 'warning',
                // //     'body' => \Yii::t('hr', 'please check the attached file for errors -  ' . $errors),
                // //     'title' => '',
                // // ]);
            } else {
                if (!$importer->save()) {
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'please check the attached file for errors '),
                        'title' => '',
                    ]);
                } else {
                    $saved = true;
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully, count imported ( ' . count($importer->getModels()) . ' )'),
                        'title' => '',
                    ]);
                }
            }
        }
        return $this->render('form', ['model' => $model,
            'importer'=>$importer,
            'saved' => $saved,
            'filename' => 'Schools.xlsx',
        ]);
    }

    public function actionSchoolsCourses()
    {
        $errors = '';
        $saved = false;
        $model = new FileUploadHelper();
        if ($model->load(Yii::$app->request->post())) {
            $uploadFile = UploadedFile::getInstance($model, 'file');

            $importer = new \Gevman\Yii2Excel\Importer([
                'filePath' => $uploadFile->tempName,
                'activeRecord' => SchoolCourse::class,
                'scenario' => SchoolCourse::SCENARIO_IMPORT,
                'skipFirstRow' => true,
                'fields' => [
                    [
                        'attribute' => 'school_id',
                        'value' => function ($row) {
                            return Yii::$app->session->get('schoolId');
                        },
                    ],
                    [
                        'attribute' => 'title',
                        'value' => function ($row) {
                            return strval($row[0]);
                        },
                    ],
                    [
                        'attribute' => 'title_ar',
                        'value' => function ($row) {
                            return strval($row[1]);
                        },
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($row) {
                            return strval($row[2]) == "Yes" ? 1 : 0;
                        },
                    ],
                    [
                        'attribute' => 'school_course_type_id',
                        'value' => function ($row) {
                            $typeObj = SchoolCourseType::find()->where(['title' => strval($row[3])])->one();
                            if ($typeObj) {
                                return $typeObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'school_course_study_language_id',
                        'value' => function ($row) {
                            $langObj = SchoolCourseStudyLanguage::find()->where(['title' => strval($row[4])])->one();
                            if ($langObj) {
                                return $langObj->id;
                            }
                            return '';
                        },
                    ],
                    [
                        'attribute' => 'min_age',
                        'value' => function ($row) {
                            return strval($row[5]);
                        },
                    ],
                    [
                        'attribute' => 'required_level',
                        'value' => function ($row) {
                            $value = $row[6];
                            if ($value == 'Beginner' || $value == 'beginner') {
                                return SchoolCourse::COURSE_TYPE_BEGINNER;
                            } elseif ($value == 'Intermediate' || $value == 'intermediate') {
                                return SchoolCourse::COURSE_TYPE_INTERMEDIATE;
                            } elseif ($value == 'Professional' || $value == 'professional') {
                                return SchoolCourse::COURSE_TYPE_PROFESSIONAL;
                            }
                            return 'NotValid';
                        },
                    ],
                    [
                        'attribute' => 'time_of_course',
                        'value' => function ($row) {
                            $value = $row[7];
                            if ($value == 'Morning' || $value == 'morning') {
                                return SchoolCourse::COURSE_TIME_MORNING;
                            } elseif ($value == 'Evening' || $value == 'evening') {
                                return SchoolCourse::COURSE_TIME_EVENING;
                            }
                            return 'NotValid';
                        },
                    ],
                    [
                        'attribute' => 'study_books_fees',
                        'value' => function ($row) {
                            return strval($row[8]);
                        },
                    ],
                    [
                        'attribute' => 'registeration_fees',
                        'value' => function ($row) {
                            return strval($row[9]);
                        },
                    ],
                    [
                        'attribute' => 'discount',
                        'value' => function ($row) {
                            return strval($row[10]);
                        },
                    ],
                    [
                        'attribute' => 'lessons_per_week',
                        'value' => function ($row) {
                            return strval($row[11]);
                        },
                    ],
                    [
                        'attribute' => 'lesson_duration',
                        'value' => function ($row) {
                            return strval($row[12]);
                        },
                    ],
                    [
                        'attribute' => 'max_no_of_students_per_class',
                        'value' => function ($row) {
                            return strval($row[13]);
                        },
                    ],
                    [
                        'attribute' => 'avg_no_of_students_per_class',
                        'value' => function ($row) {
                            return strval($row[14]);
                        },
                    ],
                    [
                        'attribute' => 'information',
                        'value' => function ($row) {
                            return strval($row[15]);
                        },
                    ],
                    [
                        'attribute' => 'information_ar',
                        'value' => function ($row) {
                            return strval($row[16]);
                        },
                    ],
                    [
                        'attribute' => 'requirments',
                        'value' => function ($row) {
                            return strval($row[17]);
                        },
                    ],
                    [
                        'attribute' => 'requirments_ar',
                        'value' => function ($row) {
                            return strval($row[18]);
                        },
                    ],
                    [
                        'attribute' => 'cost_type',
                        'value' => function ($row) {
                            return strval($row[19]) == "Yes" ? 2 : 1;
                        },
                    ],
                ],

            ]);

            // return var_dump($importer->getModels());
            if (!$importer->validate()) {
                // foreach ($importer->getErrors() as $rowNumber => $errors) {
                //     $errors .= "$rowNumber errors <br>" . implode('<br>', $errors);
                // }
                // // Yii::$app->getSession()->setFlash('alert', [
                // //     'type' => 'warning',
                // //     'body' => \Yii::t('hr', 'please check the attached file for errors -  ' . $errors),
                // //     'title' => '',
                // // ]);
            } else {
                if (!$importer->save()) {
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'please check the attached file for errors '),
                        'title' => '',
                    ]);
                } else {
                    $saved = true;
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' => 'success',
                        'body' => \Yii::t('hr', 'Data has been imported successfully, count imported ( ' . count($importer->getModels()) . ' )'),
                        'title' => '',
                    ]);
                }
            }
        }
        return $this->render('form', ['model' => $model,
            'importer'=>$importer,
            'saved' => $saved,
            'filename' => 'SchoolCourse.xlsx',
        ]);
    }
}
