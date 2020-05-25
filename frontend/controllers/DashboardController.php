<?php

namespace frontend\controllers;

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
class DashboardController extends FrontendController
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionEducation()
    {
        return $this->render('education');
    }
    public function actionRequests()
    {
        return $this->render('requests');
    }

}
