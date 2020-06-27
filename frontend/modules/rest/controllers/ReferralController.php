<?php

namespace frontend\modules\rest\controllers;

use backend\models\base\UniversityPrograms;
use backend\models\Requests;
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
            if ($params['slug']) {
                $programObj = UniversityPrograms::find()->where(['slug' => $params['slug']])->one();
                if (!$programObj) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed']);
                }

            } else {
                return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not allowed']);
            }
            foreach ($students as $param) {
                //    echo $param['firstName'] . ' '. $param['lastName'] . ' '. $param['gender'] . ' '. $param['countryId'] . ' '
                //                        . $param['stateId'] . ' '. $param['cityId'] . ' '. $param['email'] . ' '. $param['mobile'] . ' '. $param['nationality'] . '<br/> ';

                $requestObj = new Requests();
                $requestObj->model_name = Requests::MODEL_NAME_PROGRAM;
                $requestObj->model_id = $programObj->id;
                $requestObj->model_parent_id = $programObj->university->id;
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
                if (!$requestObj->save()) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => $requestObj->errors]);
                }

            }
            return ResponseHelper::sendSuccessResponse();
        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Missing Data']);

        }

    }

    public function actionDecline()
    {
        $params = \Yii::$app->request->post();

        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        $profile = $user->userProfile;

        if (isset($params['invitationId'])) {
            $invitationObj = Invitation::findOne(['id' => $params['invitationId'], 'status' => Invitation::STATUS_NEW]);

            if ($invitationObj && ($invitationObj->parent_phone == $user->username)) {
                if (isset($params['notificationId'])) {
                    Notifications::findOne(['id' => $params['notificationId']])->delete();
                }

                $title = 'Your Invitation has been Rejected';

                $message = 'Parent ' . $invitationObj->parent->userProfile->fullName . ' has Rejected your invitation';
                $messageToSave = 'Parent **' . $invitationObj->parent->userProfile->fullName . '** has Rejected your invitation';
                //record notification and send to trainer
                $notificationObj = new Notifications();
                $notificationObj->from = $user->id;
                $notificationObj->to = $invitationObj->trainer_id;
                $notificationObj->topic = Notifications::TOPIC_REJECTED_INVITATON;
                $notificationObj->message = $messageToSave;
                $notificationObj->model = 'Invitation';
                $notificationObj->model_id = $invitationObj->id;
                $notificationObj->save();

                //send push notification
                PushNotification::instance()->sendParentDeclineNotification($invitationObj->trainer->userProfile->device_token, $title, $message);
                // $TrainerPhone =myClearPhone($invitationObj->trainer->username);

                //  SMS::send( $TrainerPhone, $message);
                // SMS::send( $TrainerPhone, $message,$invitationObj->parent_phone_prefix);

                //Delete record for parent invitation
                $invitationObj->delete();

                return ResponseHelper::sendSuccessResponse(true);

            } else {
                return ResponseHelper::sendFailedResponse(['MESSAGE' => "INVALID ACCESS"]);
            }

        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => "Missing PARAMS"]);

        }

    }

    // prant accept child add from trainer to be done
    public function actionAcceptChildAssign()
    {
        $params = \Yii::$app->request->post();

        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        $profile = $user->userProfile;

        if (isset($params['invitationId'])) {
            // child the table that carry the trainer request to train children ToBeRefactored
            $invitationObj = Childs::findOne(['id' => $params['invitationId'], 'status' => Childs::STATUS_PENDING]);

            if ($invitationObj && ($invitationObj->parent_id == $profile->user_id)) {
                if (isset($params['notificationId'])) {
                    Notifications::findOne(['id' => $params['notificationId']])->delete();
                }

                //update invitation object
                $invitationObj->status = Childs::STATUS_APPROVE;
                if (!$invitationObj->save()) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => $invitationObj->errors]);

                }

                $title = "Your Invitation has been Accepted";
                $message = "Child " . $invitationObj->child->name . " has been added to your trainees list"; // 'Child Assign has been accepted';
                $messageToSave = "Child **" . $invitationObj->child->name . "** has been added to your trainees list"; // 'Child Assign has been accepted';

                if ($invitationObj) {
                    //record notification and send to trainer
                    $notificationObj = new Notifications();
                    $notificationObj->from = $invitationObj->parent_id;
                    $notificationObj->to = $invitationObj->trainer_id;
                    $notificationObj->topic = Notifications::TOPIC_PARENT_APPROVE_CHILD;
                    $notificationObj->message = $messageToSave;
                    $notificationObj->model = 'Childs';
                    $notificationObj->model_id = $invitationObj->id;
                    if (!$notificationObj->save()) {
                        return ResponseHelper::sendFailedResponse(['MESSAGE' => $notificationObj->errors]);

                    }

                    //send notify

                    //send push notification
                    PushNotification::instance()->sendParentAcceptChildAssigneNotification($invitationObj->trainer->userProfile->device_token, $message, $invitationObj->parent_id, $title);
                    // SMS::send( myClearPhone($invitationObj->trainer->username) , $message,$invitationObj->parent_phone_prefix);
                    return ResponseHelper::sendSuccessResponse();

                } else {

                    return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not Found']);

                }

            } else {
                return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not Found']);

            }

        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'Not Found']);

        }

    }

    public function actionDeclineChildAssign()
    {
        $params = \Yii::$app->request->post();

        $user = User::findOne(['id' => \Yii::$app->user->identity->getId()]);
        $profile = $user->userProfile;

        if (isset($params['invitationId'])) {
            if (isset($params['notificationId'])) {
                Notifications::findOne(['id' => $params['notificationId']])->delete();
            }
            // child the table that carry the trainer request to train children ToBeRefactored
            $invitationObj = Childs::findOne(['id' => $params['invitationId'], 'status' => Childs::STATUS_PENDING]);

            if ($invitationObj && ($invitationObj->parent_id == $profile->user_id)) {

                //update invitation object
                $invitationObj->status = Childs::STATUS_NOT_SENT;
                if (!$invitationObj->save()) {
                    return ResponseHelper::sendFailedResponse(['MESSAGE' => $invitationObj->errors]);

                }

                $title = 'Your Invitation has been Rejected';
                $message = 'Parent ' . $invitationObj->parent->userProfile->fullName . ' has Rejected your invitation to add his child ' . $invitationObj->child->name;
                $messageToSave = 'Parent **' . $invitationObj->parent->userProfile->fullName . '** has Rejected your invitation to add his child **' . $invitationObj->child->name . '**';
                //record notification and send to trainer
                $notificationObj = new Notifications();
                $notificationObj->from = $user->id;
                $notificationObj->to = $invitationObj->trainer_id;
                $notificationObj->topic = Notifications::TOPIC_PARENT_DECLINE_CHILD;
                $notificationObj->message = $messageToSave;
                $notificationObj->model = 'Invitation';
                $notificationObj->model_id = $invitationObj->id;
                $notificationObj->save();

                //send push notification
                PushNotification::instance()->sendParentDeclineChildAssignNotification($invitationObj->trainer->userProfile->device_token, $title, $message);

                return ResponseHelper::sendSuccessResponse();

            } else {
                return ResponseHelper::sendFailedResponse(['MESSAGE' => 'invalid invitation owner']);

            }

        } else {
            return ResponseHelper::sendFailedResponse(['MESSAGE' => 'invalid invitation owner']);
        }

    }

}
