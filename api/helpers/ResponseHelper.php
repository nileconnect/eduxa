<?php
namespace  api\helpers;

use yii\helpers\Json;
use Yii;

class ResponseHelper {



    public static function sendFailedResponse($message,$code=401)
    {
        Yii::$app->response->setStatusCode($code);
        return [ 'success' => false, 'status' => $code, 'errors' => $message];
    }

    public static function sendSuccessResponse($data = false)
    {
        Yii::$app->response->setStatusCode(200);
        $response = [];
        $response['success'] = true;
        $response['status'] = 200;
        if($data) $response['data'] = $data;
        return  $response;
    }

}


?>