<?php

namespace frontend\controllers;

use backend\models\Country;
use backend\models\search\UniversityProgramsSearch;
use backend\models\University;
use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class UniversitiesController extends FrontendController
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $countries = Country::find()->where(['status'=>1 , 'top_destination'=>1])->all();
        $universities = University::find()->where(['status'=>1 , 'recommended'=>1])->all();

        $searchModel = new UniversityProgramsSearch();
        return $this->render('index' ,['countries'=>$countries , 'universities'=>$universities ,'searchModel'=>$searchModel]);
    }

    public function actionSearch()
    {
        $countries = Country::find()->where(['status'=>1 , 'top_destination'=>1])->all();
        $universities = University::find()->where(['status'=>1 , 'recommended'=>1])->all();

        $searchModel = new UniversityProgramsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('search' ,['countries'=>$countries , 'universities'=>$universities ,'searchModel'=>$searchModel]);
    }


    public function actionCountry($slug){
        $countries=$universities = '';
        return $this->render('country' ,['countries'=>$countries , 'universities'=>$universities]);
    }

}
