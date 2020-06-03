<?php
namespace  api\helpers;

use backend\models\Notifications;
use common\models\PushNotification;
use Yii;

class NotifyHelper {



    public static function SaveNotify($fromId ,$toId,$topic,$title ,$message ,$modeName ,$modelId)
    {
        //record notification and send to trainer
        $notificationObj = new Notifications();
        $notificationObj->from = $fromId;
        $notificationObj->to =  $toId ;
        $notificationObj->topic = $topic;
        $notificationObj->message = $title;
        $notificationObj->extra_message = $message;
        $notificationObj->model = $modeName;
        $notificationObj->model_id = $modelId;
       if(!$notificationObj->save()){
        var_dump($notificationObj->errors); die;
       }
        //send notify
        return true;
    }



    public static function SendEditClassParentNotification($eventChildren){

    }



}


?>
