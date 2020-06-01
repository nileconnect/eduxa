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
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class DashboardController extends FrontendController
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
        $seotitle=$title= 'Eduxa - User Profile';
        $this->AllTags($seotitle);
        \Yii::$app->view->title= $title;


        $user =Yii::$app->user->identity ;
        $profile =Yii::$app->user->identity->userProfile ;

        return $this->render('index',compact('profile','user'));
    }
    public function actionEducation()
    {
        $user =  Yii::$app->user->identity;

        return $this->render('education',['user'=>$user]);
    }
    public function actionRequests($slug=null)
    {
        $profile =Yii::$app->user->identity->userProfile ;

        if($slug){
            $programObj= UniversityPrograms::find()->where(['slug'=>$slug])->one();
            if(!$programObj)  throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
            //check for old requests
            $requestObj = Requests::find()->where(['model_name'=>Requests::MODEL_NAME_PROGRAM , 'model_id'=>$programObj->id ,'requester_id'=>$profile->user_id])->one();
            if($requestObj){
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('frontend', 'You have applied on this program before') ,
                    'title' =>'',
                ]);
            }else{
                //apply foo the program
                $requestObj =new Requests();
                $requestObj->model_name = Requests::MODEL_NAME_PROGRAM;
                $requestObj->model_id = $programObj->id ;
                $requestObj->model_parent_id = $programObj->university->id;
                $requestObj->request_by_role = Requests::REQUEST_BY_STUDENT;
                $requestObj->student_id = $profile->user_id;
                $requestObj->requester_id = $profile->user_id;
                $requestObj->student_first_name = $profile->firstname;
                $requestObj->student_last_name = $profile->lastname;
                $requestObj->student_gender = $profile->gender ;
                $requestObj->student_email = $profile->user->email;
                $requestObj->student_country_id = $profile->country_id;
                $requestObj->student_city_id = $profile->city_id;
                $requestObj->student_state_id = $profile->state_id;
                $requestObj->student_mobile = $profile->mobile;
                $requestObj->student_nationality_id = $profile->nationality;
                $requestObj->status = Requests::STATUS_PENDING;
                if($requestObj->save()){
                    Yii::$app->getSession()->setFlash('alert', [
                        'type' =>'success',
                        'body' => \Yii::t('frontend', 'You have applied on the program Successfully') ,
                        'title' =>'',
                    ]);
                }else{
                    var_dump($requestObj->errors);
                }
            }

        }
        $requests = $profile->requests;

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
           $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('accounting', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);


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
                'type' =>'success',
                'body' => \Yii::t('accounting', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
        }
        //var_dump($profile->errors); die;
        return $this->render('forms/_avatar', [
            'profile' => $profile,
            'saved'=>$saved
        ]);
    }

    public function  actionCertificate($id=null){
        $this->layout='_clear';
        $saved= 0;

        $user =  Yii::$app->user->identity;
        if($id){
            $model = StudentCertificate::find()->where(['user_id'=>Yii::$app->user->id , 'id'=>$id])->one();
        }else{
            $model = new StudentCertificate();
        }
        $model->user_id = $user->id ;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('accounting', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
        }
        return $this->render('forms/_certificate', [
            'user' => $user,
            'saved'=>$saved,
            'model'=>$model
        ]);
    }

    public function  actionTestResults($id=null){
        $this->layout='_clear';
        $saved= 0;

        $user =  Yii::$app->user->identity;
        if($id){
            $model = StudentTestResults::find()->where(['user_id'=>Yii::$app->user->id , 'id'=>$id])->one();
        }else{
            $model = new StudentTestResults();
        }
        $model->user_id = $user->id ;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('accounting', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
        }
        return $this->render('forms/_testresults', [
            'user' => $user,
            'saved'=>$saved,
            'model'=>$model
        ]);
    }
}
