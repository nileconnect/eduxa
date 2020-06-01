<?php

namespace frontend\controllers;

use backend\models\base\UniversityPrograms;
use backend\models\Country;
use backend\models\Schools;
use backend\models\search\SchoolCourseSearch;
use backend\models\search\UniversityProgramsSearch;
use backend\models\University;
use backend\models\UniversityProgramMajors;
use backend\models\UniversityProgStartdate;
use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SchoolsController extends FrontendController
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $countries = Country::find()->where(['status'=>1 , 'top_destination'=>1])->all();
        $universities = Schools::find()->where(['status'=>1 , 'featured'=>1])->all();

        $searchModel = new SchoolCourseSearch();
        return $this->render('index' ,['countries'=>$countries , 'universities'=>$universities ,'searchModel'=>$searchModel]);
    }

    public function actionSearch()
    {
        $searchModel = new UniversityProgramsSearch();
        $dataProvider = $searchModel->CustomSearch(Yii::$app->request->queryParams);

        return $this->render('search' ,[ 'searchModel'=>$searchModel,'dataProvider'=>$dataProvider]);
    }


    public function actionCountry($slug){
        $countries=$universities = '';
        return $this->render('country' ,['countries'=>$countries , 'universities'=>$universities]);
    }

    public function actionView($slug){
         $universityObj= University::find()->where(['slug'=>$slug])->one();
         if(!$universityObj)  throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));

         $universityMajors = UniversityProgramMajors::find()->where('id in (select  DISTINCT major_id   from university_programs where university_id='.$universityObj->id.')')->all();

        return $this->render('view' ,['universityObj'=>$universityObj ,'universityMajors'=>$universityMajors]);
    }

    public function actionProgram($slug){
        $programObj= UniversityPrograms::find()->where(['slug'=>$slug])->one();
        if(!$programObj)  throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));

        $universityObj = $programObj->university;

        $programStartDates = UniversityProgStartdate::find()->where(['university_prog_id'=>$programObj->id ])->one();

        $programsInSameMajor = UniversityPrograms::find()
            ->where(['major_id'=>$programObj->major_id])
            ->andWhere(['<>','id', $programObj->id])
            ->limit(5)->all();

        return $this->render('program' , ['programObj'=>$programObj,'universityObj'=>$universityObj ,'programStartDates'=>$programStartDates,'programsInSameMajor'=>$programsInSameMajor]);
    }

    public function actionProgramApply($slug){
         $programObj= UniversityPrograms::find()->where(['slug'=>$slug])->one();
        if(!$programObj)  throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));

        $universityObj = $programObj->university;

        $programStartDates = UniversityProgStartdate::find()->where(['university_prog_id'=>$programObj->id ])->one();

        $programsInSameMajor = UniversityPrograms::find()
            ->where(['major_id'=>$programObj->major_id])
            ->andWhere(['<>','id', $programObj->id])
            ->limit(5)->all();

        return $this->render('program-apply' , ['programObj'=>$programObj,'universityObj'=>$universityObj ,'programStartDates'=>$programStartDates,'programsInSameMajor'=>$programsInSameMajor]);
    }


}
