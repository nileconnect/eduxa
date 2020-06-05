<?php

namespace frontend\modules\rest\controllers;

use api\helpers\ResponseHelper;
use api\resources\User;
use backend\models\base\UniversityPrograms;
use backend\models\Requests;
use common\models\UserProfile;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class CourseController  extends  Controller
{

    public function actionAccommodation(){

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


}
