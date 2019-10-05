<?php

namespace backend\controllers;

use Yii;

/**
 * Site controller
 */
class SiteController extends BackendController
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

    public function beforeAction($action)
    {
        $this->layout = Yii::$app->user->isGuest || !Yii::$app->user->can('loginToBackend') ? 'base' : 'common';

        return parent::beforeAction($action);
    }


    public function actionIndex(){
        $University = $this->University;
        if( \Yii::$app->user->can('manager') or  \Yii::$app->user->can('administrator')){
            $view= 'index';
        }else if(\Yii::$app->user->can('universityManager') ){
            $view='university';
        }else{
            //logout
            Yii::$app->user->logout();
            return $this->redirect(['/sign-in/login']);
        }

        return $this->render($view,array('University'=>$University));

    }

}
