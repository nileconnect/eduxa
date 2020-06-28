<?php

namespace frontend\modules\rest\controllers;

use backend\models\base\UniversityPrograms;
use backend\models\Requests;
use backend\models\SchoolCourse;
use common\models\UserProfile;
use frontend\modules\rest\helpers\ResponseHelper;
use frontend\modules\rest\resources\User;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class StudentController extends Controller
{


    public function actionCourseRequest()
    {
        if (\Yii::$app->user->isGuest) {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed a']);
        }

        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        if (!User::IsRole($user->id, User::ROLE_USER)) {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed b']);
        }

        $profile = $user->userProfile;
        $params = \Yii::$app->request->post(); // json_decode(file_get_contents("php://input") ,true);
        if ($params) { // logged in and valid role
            $programObj = SchoolCourse::find()->where(['slug' => $params['slug']])->one();
            $parent = $programObj->school->id;
            $requestType = Requests::MODEL_NAME_COURSE;
            
            if (!$programObj) {
                return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed c']);
            }
            //check if the sudent applied before on this course
            $requestObj = Requests::find()->where(['model_name'=>Requests::MODEL_NAME_COURSE , 'model_id'=>$programObj->id ,'requester_id'=>$profile->user_id])->one();
            if($requestObj){
               
            }else{
                $requestObj = new Requests();
                $requestObj->model_name = $requestType;
                $requestObj->model_id = $programObj->id;
                $requestObj->model_parent_id = $parent;
                $requestObj->request_by_role = \common\models\User::GetRequesterRole($profile->user_id);
                $requestObj->student_id = $user->id;
                $requestObj->requester_id = $profile->user_id;
                $requestObj->student_first_name = $profile->firstname;
                $requestObj->student_last_name = $profile->lastname;
                $requestObj->student_gender = $profile->gender;
                $requestObj->student_email = $user->email;
                $requestObj->student_country_id = $profile->country_id;
                $requestObj->student_city_id = $profile->city_id;
                $requestObj->student_state_id = $profile->state_id;
                $requestObj->student_mobile = $profile->mobile;
                $requestObj->student_nationality_id = $profile->nationality;
                $requestObj->status = Requests::STATUS_PENDING;
                $requestObj->course_start_date = $params['course_start_date'];
                $requestObj->accomodation_option = $params['accomodation_option'];
                $requestObj->airport_pickup = $params['airport_pickup'];
                $requestObj->number_of_weeks = $params['number_of_weeks'];
                $requestObj->health_insurance = $params['health_insurance'] ? 1 : 0;

                if (!$requestObj->save()) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => $requestObj->errors]);
                }
            }


            return ResponseHelper::sendSuccessResponse();
        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Missing Data']);

        }

    }


    public function actionProgramRequest()
    {
        if (\Yii::$app->user->isGuest) {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed a']);
        }

        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        if (!User::IsRole($user->id, User::ROLE_USER)) {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed b']);
        }

        $profile = $user->userProfile;
        $params = \Yii::$app->request->post(); // json_decode(file_get_contents("php://input") ,true);
        if ($params && $params['slug']) { // logged in and valid role
            $programObj= UniversityPrograms::find()->where(['slug'=>$params['slug']])->one();
            if(!$programObj)   return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Invalid Data']);
            //check if the sudent applied before on this course
            $requestObj = Requests::find()->where(['model_name'=>Requests::MODEL_NAME_PROGRAM , 'model_id'=>$programObj->id ,'requester_id'=>$profile->user_id])->one();
            if($requestObj){

            }else{
                //apply foo the program
                $requestObj =new Requests();
                $requestObj->model_name = Requests::MODEL_NAME_PROGRAM;
                $requestObj->model_id = $programObj->id ;
                $requestObj->model_parent_id = $programObj->university->id;
                $requestObj->request_by_role = Requests::REQUEST_BY_STUDENT;
                $requestObj->student_id = $profile->user_id;
                $requestObj->requester_id = $profile->user_id;
                $requestObj->student_first_name = $profile->firstname;
                $requestObj->student_last_name = $profile->lastname;
                $requestObj->student_gender = $profile->gender ;
                $requestObj->student_email = $profile->user->email;
                $requestObj->student_country_id = $profile->country_id;
                $requestObj->student_city_id = $profile->city_id;
                $requestObj->student_state_id = $profile->state_id;
                $requestObj->student_mobile = $profile->mobile;
                $requestObj->student_nationality_id = $profile->nationality;
                $requestObj->status = Requests::STATUS_PENDING;

               if (!$requestObj->save()) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => $requestObj->errors]);
                }
            }


            return ResponseHelper::sendSuccessResponse();
        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Missing Data']);

        }

    }


}
