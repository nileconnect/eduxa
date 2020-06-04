<?php

namespace frontend\modules\rest\controllers;


use frontend\modules\rest\resources\CountryResourse;
use yii\data\ActiveDataFilter;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class CountryController extends ApiController
{
    public $modelClass = CountryResourse::class;

    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){

        $params= \Yii::$app->request->get();
        if($params['filter']['lang']){
            \Yii::$app->language = $params['filter']['lang'] ;
        }
        $query= $this->modelClass::find();

        $activeData = new ActiveDataProvider([
            'query' => $query,  //->where('Synch_timestamp > "2018-11-21 01:29:51" ')
            'pagination' => [
                'defaultPageSize' => $this->defaultPageSize , // to set default count items on one page
                'pageSize' => $this->pageSize, //to set count items on one page, if not set will be set from defaultPageSize
                'pageSizeLimit' => $this->pageSizeLimit, //to set range for pageSize

            ],
        ]);
        return $activeData;
    }


    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];




}

?>