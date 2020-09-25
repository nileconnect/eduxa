<?php

namespace backend\controllers;

use backend\models\base\University;
use backend\models\Schools;
use common\helpers\MyCurrencySwitcher;
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

    public function actionUpdateU(){

        $universities = Schools::find()->all();
        foreach ($universities as $university) {
            $ratio = MyCurrencySwitcher::Convert($university->currency->currency_code,"USD",1);
            $university->price_ratio = $ratio;
            $university->save(false);
        }


    }


}
