<?php

namespace api\resources;

class User extends \common\models\User
{
    public function fields()
    {
        return [
            'id',
            'email',
            'firstname'=>function($model){
                return $model->userProfile->firstname ;
            },

            'lastname'=>function($model){
                return $model->userProfile->lastname ;
            },

//            'full_name'=>function($model){
//                return $model->getPublicIdentity();
//            },
            'image'=>function($model){
                return   $model->userProfile->avatar?: \Yii::getAlias('@backendUrl'). "/img/anonymous.jpg" ;
            },

        ];
    }


}
