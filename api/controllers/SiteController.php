<?php

namespace api\controllers;

use api\helpers\ResponseHelper;
use api\resources\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{

    /*
     *The following list summarizes the HTTP status codes that are used by the Yii REST framework:

    200: OK. Everything worked as expected.
    201: A resource was successfully created in response to a POST request. The Location header contains the URL pointing to the newly created resource.
    204: The request was handled successfully and the response contains no body content (like a DELETE request).
    304: The resource was not modified. You can use the cached version.
    400: Bad request. This could be caused by various actions by the user, such as providing invalid JSON data in the request body, providing invalid action parameters, etc.
    401: Authentication failed.
    403: The authenticated user is not allowed to access the specified API endpoint.
    404: The requested resource does not exist.
    405: Method not allowed. Please check the Allow header for the allowed HTTP methods.
    415: Unsupported media type. The requested content type or version number is invalid.
    422: Data validation failed (in response to a POST request, for example). Please check the response body for detailed error messages.
    429: Too many requests. The request was rejected due to rate limiting.
    500: Internal server error. This could be caused by internal program errors.


     *
     *
     *
     *
     */
    public function actionIndex(){

        //return 'API...';
        return $this->redirect(\Yii::getAlias('@frontendUrl'));
    }


    public function actionTest(){

        return 'Test API...';
        //return $this->redirect(\Yii::getAlias('@frontendUrl'));
    }




    public function actionLogin(){
        $params = \Yii::$app->request->post();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = User::find()
            ->active()
            ->andWhere(['or', ['username' => $params['identity'] ], ['email' => $params['identity']]])
            ->one();
        if(! $user){
            return ResponseHelper::sendFailedResponse('Invalid email');
        }
        $valid_password = Yii::$app->getSecurity()->validatePassword($params['password'], $user->password_hash);
        if($valid_password){
            $roles = ArrayHelper::getColumn( Yii::$app->authManager->getRolesByUser($user->getId()),'description');
            return ResponseHelper::sendSuccessResponse(['token'=>$user->access_token,'type'=>$roles, 'profile'=> $user ]);
        }else{
            return ResponseHelper::sendFailedResponse('Invalid password');
        }
    }


    public function actionError()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            $exception = new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        if ($exception instanceof \HttpException) {
            Yii::$app->response->setStatusCode($exception->getCode());
        } else {
            Yii::$app->response->setStatusCode(500);
        }

        return $this->asJson(['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
    }
}