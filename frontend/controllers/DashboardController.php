<?php

namespace frontend\controllers;

use backend\models\base\SchoolCourse;
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
class DashboardController extends FrontendController
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
        $seotitle=$title= 'Eduxa - Profile';
        $this->AllTags($seotitle);
        \Yii::$app->view->title= $title;


        $user = Yii::$app->user->identity ;
        $profile = Yii::$app->user->identity->userProfile ;

        return $this->render('index',compact('profile','user'));
    }

    public function actionEducation()
    {
        $seotitle=$title= 'Eduxa - Profile';
        $this->AllTags($seotitle);
        \Yii::$app->view->title= $title;

        $user =  Yii::$app->user->identity;
        $this->view->title = \Yii::t('frontend','Education Info');

        return $this->render('education',['user'=>$user]);
    }

    public function actionRequests()
    {
        $seotitle=$title= 'Eduxa - Profile';
        $this->AllTags($seotitle);
        \Yii::$app->view->title= $title;

        $profile =Yii::$app->user->identity->userProfile ;
        $this->view->title = \Yii::t('frontend','My Requests');
        $requests = $profile->availableRequests;
        return $this->render('requests',['requests'=>$requests]);
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
                    'body' => \Yii::t('frontend', 'You can not cancel this  request') ,
                    'title' =>'',
                ]);
            }
        }
       return $this->redirect(['/dashboard/requests']);
    }

    public function actionCancelCourseRequest($slug=null)
    {
        $profile =Yii::$app->user->identity->userProfile ;

        if($slug){
            $SchoolCourseObj= SchoolCourse::find()->where(['slug'=>$slug])->one();
            if(!$SchoolCourseObj)  throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
            //check for old requests
            $requestObj = Requests::find()->where(['model_name'=>Requests::MODEL_NAME_COURSE , 'model_id'=>$SchoolCourseObj->id ,'requester_id'=>$profile->user_id])->one();
            if($requestObj && $requestObj->status == Requests::STATUS_PENDING){
                // $requestObj->delete();
                $requestObj->status = 4;
                $requestObj->save(false);
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('frontend', 'You have Canceled your request') ,
                    'title' =>'',
                ]);
            }else{
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'warning',
                    'body' => \Yii::t('frontend', 'You can not cancel this  request') ,
                    'title' =>'',
                ]);
            }
        }
        return $this->redirect(['/dashboard/requests']);
    }

    // Modals Functions

    public function  actionUpdateProfile(){

        $seotitle=$title= 'Eduxa - Profile';
        $this->AllTags($seotitle);
        \Yii::$app->view->title= $title;

        $this->layout='_clear';
        $saved= 0;

        $accountForm = new AccountForm();
        $accountForm->setUser(Yii::$app->user->identity);

        $profile = Yii::$app->user->identity->userProfile;
        $profile->scenario = 'updateStudentProfileInFront';

        if ($accountForm->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            if($profile->interested_in_university == 0 and $profile->interested_in_schools == 0){
                $profile->interested_in_university = ''; 
            }
            $isValid = $accountForm->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $accountForm->save(false);
                $profile->save(false);
                $saved= 1;
                Yii::$app->getSession()->setFlash('alert', [
                    'type' =>'success',
                    'body' => \Yii::t('frontend', 'Data has been updated Successfully') ,
                    'title' =>'',
                ]);
            }
        }
        return $this->render('forms/profile_data', [
            'accountForm'=> $accountForm,
            'profile'=> $profile,
            'saved'=>$saved
        ]);
    }

    public function  actionUpdateAvatar(){
        $this->layout='_clear';
        $saved= 0;

        $profile =  Yii::$app->user->identity->userProfile;

        if ($profile->load(Yii::$app->request->post()) && $profile->save()) {
            if(Yii::$app->user->identity->studentCertificates || Yii::$app->user->identity->studentTestResults){
                $profile->profile_percentage = 100;
                $profile->save(false);
            }else{
                $profile->profile_percentage = 70;
                $profile->save(false);
            }

            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('frontend', 'Data has been updated Successfully') ,
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

            $profile = Yii::$app->user->identity->userProfile ;
            if($profile->avatar_path){
                $profile->profile_percentage = 100;
                $profile->save(false);
            }else{
                $profile->profile_percentage = 90;
                $profile->save(false);
            }

            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('frontend', 'Data has been updated Successfully') ,
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

            $profile = Yii::$app->user->identity->userProfile ;
            if($profile->avatar_path){
                $profile->profile_percentage = 100;
                $profile->save(false);
            }else{
                $profile->profile_percentage = 90;
                $profile->save(false);
            }

            $saved= 1;
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('frontend', 'Data has been updated Successfully') ,
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
