<?php

namespace backend\controllers;


use backend\models\University;
use webvimark\behaviors\multilanguage\MultiLanguageHelper;

/**
 * Site controller
 */
class BackendController extends \yii\web\Controller
{
    public  $University;
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

        MultiLanguageHelper::catchLanguage();
        \Yii::$app->language= 'en-US';

        if(\Yii::$app->user->can('universityManager')){

            $universityObj = University::find()->where(['responsible_id'=>\Yii::$app->user->id])->one();
            if($universityObj){
                $this->University =$universityObj;

            }else{
                $this->University = null;

            }

        }


        parent::init();
    }



}
