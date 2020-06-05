<?php

namespace frontend\modules\rest\controllers;
use frontend\modules\rest\resources\SchoolAccomodationResourse;
use yii\data\ActiveDataProvider;

class SchoolAccomodtionController extends ApiController
{
    public $modelClass = SchoolAccomodationResourse::class;

    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){

        $params= \Yii::$app->request->get()['filter'];
        if($params['lang']){
            \Yii::$app->language = $params['lang'] ;
        }
        $query= $this->modelClass::find();
        $query->andwhere(['school_id'=>$params['school_id']]);

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