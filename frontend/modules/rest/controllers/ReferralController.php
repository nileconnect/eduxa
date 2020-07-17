<?php

namespace frontend\modules\rest\controllers;

use backend\models\base\UniversityPrograms;
use backend\models\Requests;
use backend\models\SchoolCourse;
use common\models\UserProfile;
use frontend\modules\rest\helpers\ResponseHelper;
use frontend\modules\rest\resources\User;
use yii\rest\Controller;

class ReferralController extends Controller
{

    public function actionAddRequest()
    {
        if (!\Yii::$app->user->identity->getId()) {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed']);
        }
        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        if (User::IsRole($user->id, User::ROLE_USER)) {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed']);
        }
        $profile = $user->userProfile;
        $params = \Yii::$app->request->post(); // json_decode(file_get_contents("php://input") ,true);
        if ($params) { // logged in and valid role
            $students = $params['students'];
            if ($params['type'] == 'programe') {
                if ($params['slug']) {
                    $programObj = UniversityPrograms::find()->where(['slug' => $params['slug']])->one();
                    $parent = $programObj->university->id;
                    $requestType = Requests::MODEL_NAME_PROGRAM;
                    if (!$programObj) {
                        return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed d']);
                    }

                } else {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed c']);
                }
            } else {
                if ($params['type'] == 'course') {
                    $programObj = SchoolCourse::find()->where(['slug' => $params['slug']])->one();
                    $parent = $programObj->school->id;
                    $requestType = Requests::MODEL_NAME_COURSE;
                    if (!$programObj) {
                        return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed b']);
                    }

                } else {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed a']);
                }
            }

            foreach ($students as $param) {
                //    echo $param['firstName'] . ' '. $param['lastName'] . ' '. $param['gender'] . ' '. $param['countryId'] . ' '
                //                        . $param['stateId'] . ' '. $param['cityId'] . ' '. $param['email'] . ' '. $param['mobile'] . ' '. $param['nationality'] . '<br/> ';

                $requestObj = new Requests();
                $requestObj->model_name = $requestType;
                $requestObj->model_id = $programObj->id;
                $requestObj->model_parent_id = $parent;
                $requestObj->request_by_role = \common\models\User::GetRequesterRole($profile->user_id);
                $requestObj->student_id = '';
                $requestObj->requester_id = $profile->user_id;
                $requestObj->student_first_name = $param['firstName'];
                $requestObj->student_last_name = $param['lastName'];
                $requestObj->student_gender = $param['gender'] == "male" ? UserProfile::GENDER_MALE : UserProfile::GENDER_FEMALE;
                $requestObj->student_email = $param['email'];
                $requestObj->student_country_id = $param['countryId'];
                $requestObj->student_city_id = $param['cityId'];
                $requestObj->student_state_id = $param['stateId'];
                $requestObj->student_mobile = $param['mobile'];
                $requestObj->student_nationality_id = $param['nationality'];
                $requestObj->status = Requests::STATUS_PENDING;

                if($requestType == Requests::MODEL_NAME_COURSE){
                    $requestObj->course_start_date = $params['course_start_date'];
                    $requestObj->accomodation_option = $params['accomodation_option'];
                    $requestObj->airport_pickup = $params['airport_pickup'];
                    $requestObj->number_of_weeks = $params['number_of_weeks'];
                    $requestObj->health_insurance = $params['health_insurance'] ? 1 : 0;
                }

                if (!$requestObj->save()) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => $requestObj->errors]);
                }

            }
            return ResponseHelper::sendSuccessResponse();
        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Missing Data']);

        }

    }

    public function actionAddStudentCourseRequest()
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

}
