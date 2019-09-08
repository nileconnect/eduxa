<?php

namespace backend\controllers;


/**
 * Site controller
 */
class BackendController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function init()
    {
        parent::init();

        if(\Yii::$app->user->can('salesManager') ){

        }else if(\Yii::$app->user->can('salesRepresentative')){

        }else{
            // echo "fFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFff";die;

        }
    }




}
