<?php

namespace api\controllers;

use api\helpers\ResponseHelper;
use api\modules\v1\resources\UserResource;
use api\resources\User;

class ProfileController extends  MyActiveController
{
    public $modelClass=UserResource::class;
    public function actionIndex(){

        $resource = new User();
        $resource->load(\Yii::$app->user->getIdentity()->attributes, '');

        $profile= User::findOne(['username'=>$resource->username]);

        return ResponseHelper::sendSuccessResponse($profile);
    }

    public function actionUpdate(){
        $params = \Yii::$app->request->post();
        $user= User::findOne(['id'=> \Yii::$app->user->identity->getId()]) ;
        $profile=$user->userProfile;
        $profile->firstname= $params['firstname'] ;
        $profile->lastname= $params['lastname'] ;

        if (isset($params['email'])) $user->email= $params['email'] ;

        if (isset($params['binary'] )  &&  $params['binary']!= "" ){
//            $filename = Media::PrepareImage($params['binary'] );
//            $profile->image ='/uploads/profile/'.$filename ;
        }

        if (isset($params['password'])) $user->password = $params['password'];

        if($user->save() && $profile->save()){

            return ResponseHelper::sendSuccessResponse($user);
        }else{
            return ResponseHelper::sendFailedResponse($profile->errors);
        }


    }



}