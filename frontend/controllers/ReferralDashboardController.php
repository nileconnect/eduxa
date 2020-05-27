<?php

namespace frontend\controllers;

use backend\models\StudentCertificate;
use backend\models\StudentTestResults;
use cheatsheet\Time;
use common\base\MultiModel;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use frontend\modules\user\models\AccountForm;
use Intervention\Image\ImageManagerStatic;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class ReferralDashboardController extends FrontendController
{


    public function actions()
    {
        return [
            'avatar-upload' => [
                'class' => UploadAction::class,
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                    /* @var $file \League\Flysystem\File */
                    $file = $event->file;
                    $img = ImageManagerStatic::make($file->read())->fit(215, 215);
                    $file->put($img->encode());
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::class
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $user =Yii::$app->user->identity ;
        $profile =Yii::$app->user->identity->userProfile ;

        return $this->render('index',compact('profile','user'));
    }
    public function actionRequests()
    {
        return $this->render('requests');
    }

    // Modals Functions

    public function  actionUpdateProfile(){
        $this->layout='_clear';
        $saved= 0;


        $accountForm = new AccountForm();
        $accountForm->setUser(Yii::$app->user->identity);

        $model = new MultiModel([
            'models' => [
                'account' => $accountForm,
                'profile' => Yii::$app->user->identity->userProfile
            ]
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $locale = $model->getModel('profile')->locale;
            Yii::$app->session->setFlash('forceUpdateLocale');
            Yii::$app->session->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => Yii::t('frontend', 'Your account has been successfully saved', [], $locale)
            ]);
            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => Yii::t('backend', 'Data Saved Successfully')]);

            //   return $this->refresh();

        }
        return $this->render('forms/profile_data', [
            'model' => $model,
            'saved'=>$saved
        ]);
    }
    public function  actionUpdateAvatar(){
        $this->layout='_clear';
        $saved= 0;

        $profile =  Yii::$app->user->identity->userProfile;

        if ($profile->load(Yii::$app->request->post()) && $profile->save()) {
            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => Yii::t('backend', 'Data Saved Successfully')]);
        }
        return $this->render('forms/_avatar', [
            'profile' => $profile,
            'saved'=>$saved
        ]);
    }

}
