<?php
namespace frontend\modules\rest\helpers;


use Yii;

class ResponseHelper {



    public static function sendFailedResponse($errors,$code=401)
    {
        $message = [];
        $message[] = $errors;

        Yii::$app->response->setStatusCode($code);
        return [ 'success' => false, 'status' => $code, 'errors' => $message];
    }

    public static function sendSuccessResponse($data = false ,$code= 200 ,$location= false )
    {
       Yii::$app->response->setStatusCode($code);
        $response = [];
        $response['success'] = true;
        $response['status'] = $code;
        if($data) $response['data'] = $data;
        return  $response;
    }


}


?>
