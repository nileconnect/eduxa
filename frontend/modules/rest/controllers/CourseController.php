<?php

namespace frontend\modules\rest\controllers;

use backend\models\base\UniversityPrograms;
use backend\models\Requests;
use backend\models\SchoolAccomodation;
use backend\models\SchoolCourse;
use backend\models\SchoolCourseSessionCost;
use backend\models\SchoolCourseStartDate;
use backend\models\SchoolCourseWeekCost;
use common\models\User;
use common\models\UserProfile;
use frontend\modules\rest\helpers\ResponseHelper;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class CourseController  extends  Controller
{

    public function actionStartDates(){
        $params= \Yii::$app->request->get();
        if($params['filter']['lang']){
            \Yii::$app->language = $params['filter']['lang'] ;
        }
        $course_id =  $params['filter']['course_id'];
        if(!$course_id)  return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
        $courseStartDates = SchoolCourseStartDate::find()->where(['school_course_id'=>$course_id])->asArray()->all();
        return ResponseHelper::sendSuccessResponse(['items'=>$courseStartDates]);

    }

    public function actionDurationCost(){
        $params= \Yii::$app->request->get();
        if($params['filter']['lang']){
            \Yii::$app->language = $params['filter']['lang'] ;
        }
        $course_id =  $params['filter']['course_id'];
        $no_of_weeks =  $params['filter']['no_of_weeks'];
        if(!$course_id or !$no_of_weeks )  return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);

        $courseObj= SchoolCourse::find()->where(['id'=>$course_id])->one();
        if(!$courseObj )  return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
        if($courseObj->cost_type == SchoolCourse::COST_PER_WEEK){
            //get cost per week
            $costObj = SchoolCourseWeekCost::find()->where('school_course_id ='.$courseObj->id.' and  min_no_of_weeks <= '.$no_of_weeks.' and max_no_of_weeks >='.$no_of_weeks)->one();
            if(!$costObj)  return ResponseHelper::sendSuccessResponse(['cost'=>0]);
            $cost=$costObj->cost ;
        }
        if($courseObj->cost_type == SchoolCourse::COST_PER_SESSION){
            //get cost per week
            $costObj = SchoolCourseSessionCost::find()->where('school_course_id ='.$courseObj->id)->one();
            if(!$costObj)  return ResponseHelper::sendSuccessResponse(['cost'=>0]);
            $cost=$costObj->session_cost ;
        }
        $total_cost = round($cost*$no_of_weeks );

        return ResponseHelper::sendSuccessResponse(['cost'=>$total_cost]);

    }

    public function actionAddRequest()
    {
        if(! \Yii::$app->user->identity->getId()){
            return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
        }
        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        if(User::IsRole($user->id , User::ROLE_USER) ){
            return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
        }
        $profile = $user->userProfile;
        $params =  \Yii::$app->request->post() ; // json_decode(file_get_contents("php://input") ,true);
        if($params){  // logged in and valid role
            $students = $params['students'];
            if($params['slug']) {
                $programObj = UniversityPrograms::find()->where(['slug' => $params['slug']])->one();
                if (!$programObj) return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
            }else{
                return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
            }
            foreach ($students as $param) {
//                echo $param['firstName'] . ' '. $param['lastName'] . ' '. $param['gender'] . ' '. $param['countryId'] . ' '
//                    . $param['stateId'] . ' '. $param['cityId'] . ' '. $param['email'] . ' '. $param['mobile'] . ' '. $param['nationality'] . '<br/> ';

                $requestObj =new Requests();
                $requestObj->model_name = Requests::MODEL_NAME_PROGRAM;
                $requestObj->model_id = $programObj->id ;
                $requestObj->model_parent_id = $programObj->university->id;
                $requestObj->request_by_role = \common\models\User::GetRequesterRole($profile->user_id);
                $requestObj->student_id = '';
                $requestObj->requester_id = $profile->user_id;
                $requestObj->student_first_name = $param['firstName'];
                $requestObj->student_last_name = $param['lastName'];
                $requestObj->student_gender = $param['gender'] =="male"?UserProfile::GENDER_MALE : UserProfile::GENDER_FEMALE ;
                $requestObj->student_email = $param['email'];
                $requestObj->student_country_id = $param['countryId'];
                $requestObj->student_city_id = $param['cityId'];
                $requestObj->student_state_id = $param['stateId'];
                $requestObj->student_mobile = $param['mobile'];
                $requestObj->student_nationality_id = $param['nationality'];
                $requestObj->status = Requests::STATUS_PENDING;
                if(! $requestObj->save()){
                    return ResponseHelper::sendFailedResponse(['MESSAGE'=> $requestObj->errors]);
                }


            }
            return ResponseHelper::sendSuccessResponse();
        }else{
            return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Missing Data']);

        }


    }

    public function actionAccommodationCost(){
        $params= \Yii::$app->request->get();
        if($params['filter']['lang']){
            \Yii::$app->language = $params['filter']['lang'] ;
        }
        $accomodation_id =  $params['filter']['accommodation_id'];
        $period =  $params['filter']['period'];
        if(!$accomodation_id or !$period )  return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);
        $accomodationObj = SchoolAccomodation::find()->where(['id'=>$accomodation_id])->one();
        if(!$accomodationObj) return ResponseHelper::sendFailedResponse(['MESSAGE'=> 'Not allowed']);

        $cost = round(($accomodationObj->cost_per_duration_unit  * $period) + $accomodationObj->fees );
        return ResponseHelper::sendSuccessResponse(['cost'=>$cost]);

    }


}
