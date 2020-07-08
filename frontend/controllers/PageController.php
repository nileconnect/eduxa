<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace frontend\controllers;

use common\models\Page;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends FrontendController
{
//    public function actionView($slug)
//    {
//        $model = Page::find()->where(['slug' => $slug, 'status' => Page::STATUS_PUBLISHED])->one();
//        if (!$model) {
//            throw new NotFoundHttpException(Yii::t('frontend', 'Page not found'));
//        }
//
//        $viewFile = $model->view ?: 'view';
//        return $this->render($viewFile, ['model' => $model]);
//    }


    public function actionAbout(){
        $slug = Yii::$app->language == 'en' ? 'about':'about-ar';
        $model = Page::find()->where(['slug' => $slug])->one();
        return $this->render('view', ['model' => $model]);
    }
    public function actionHowWeWork(){
        $slug = Yii::$app->language == 'en' ? 'how-we-work':'how-we-work-ar';
        $model = Page::find()->where(['slug' => $slug])->one();
        return $this->render('view', ['model' => $model]);
    }

    public function actionContact(){
        $slug = Yii::$app->language == 'en' ? 'contact':'contact-ar';

        $model = Page::find()->where(['slug' =>$slug])->one();
        return $this->render('view', ['model' => $model]);
    }
    public function actionTerms(){
        $slug = Yii::$app->language == 'en' ? 'terms':'terms-ar';

        $model = Page::find()->where(['slug' => $slug])->one();
        return $this->render('view', ['model' => $model]);
    }
    public function actionPrivacy(){
        $slug = Yii::$app->language == 'en' ? 'privacy':'privacy-ar';
        $model = Page::find()->where(['slug' => $slug])->one();
        return $this->render('view', ['model' => $model]);
    }
}
