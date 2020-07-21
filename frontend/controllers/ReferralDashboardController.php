<?php

namespace frontend\controllers;

use backend\models\base\UniversityPrograms;
use backend\models\Requests;
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
use yii\filters\AccessControl;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class ReferralDashboardController extends FrontendController
{

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

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
        $profile =Yii::$app->user->identity->userProfile ;
        $requests = $profile->availableRequests;
        return $this->render('requests',['requests'=>$requests]);
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
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('frontend', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);

            $saved= 1;
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
        $profile->gender = 1;
        if ($profile->load(Yii::$app->request->post()) and $profile->save()) {
            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('frontend', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
        }
        return $this->render('forms/_avatar', [
            'profile' => $profile,
            'saved'=>$saved
        ]);
    }


    public function actionCancelRequest($slug=null)
    {
        $profile =Yii::$app->user->identity->userProfile ;

        if($slug){
            $programObj= UniversityPrograms::find()->where(['slug'=>$slug])->one();
            if(!$programObj)  throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
            //check for old requests
            $requestObj = Requests::find()->where(['model_name'=>Requests::MODEL_NAME_PROGRAM , 'model_id'=>$programObj->id ,'requester_id'=>$profile->user_id])->one();
            if($requestObj && $requestObj->status == Requests::STATUS_PENDING){
                $requestObj->delete();
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('frontend', 'You have Canceled your request') ,
                    'title' =>'',
                ]);
            }else{
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('frontend', 'You can no cancel this  request') ,
                    'title' =>'',
                ]);
            }
        }
        return $this->redirect(['/referral-dashboard/requests']);
    }

}
