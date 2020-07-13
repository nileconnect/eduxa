<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use backend\models\StudentModel;
use backend\models\UserForm;
use common\models\User;
use common\models\UserProfile;
use common\models\UserToken;
use Intervention\Image\ImageManagerStatic;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BackendController
{
    public function beforeAction($action)
    {
        return Yii::$app->user->identity->checkPermmissions('users')?: $this->redirect('/') ;
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();

        if(isset($_REQUEST['user_role'])){
            Yii::$app->session->set('UserRole',$_REQUEST['user_role']);
        }

        if(!Yii::$app->user->can('administrator') && Yii::$app->session->get('UserRole')== "manager" ){
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('backend', 'You are not allowed') ,
                'title' =>'',
            ]);
            return $this->redirect('/');
        }

        $searchModel->user_role = Yii::$app->session->get('UserRole');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => [ 'id'=>SORT_DESC ],
        ]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = User::find()->where(['id'=>$id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->permissions = $model->permission ? implode(',',$model->permission) : '';
            $model->save();
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     * @throws NotFoundHttpException
     */
    public function actionLogin($id)
    {
        $model = $this->findModel($id);
        $tokenModel = UserToken::create(
            $model->getId(),
            UserToken::TYPE_LOGIN_PASS,
            60
        );

        return $this->redirect(
            Yii::$app->urlManagerFrontend->createAbsoluteUrl(['user/sign-in/login-by-pass', 'token' => $tokenModel->token])
        );
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('administrator')){
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('backend', 'You are not allowed') ,
                'title' =>'',
            ]);
            return $this->redirect('index');
        }
        $model = new UserForm();
        $profile= new UserProfile();
        $profile->locale = 'en-US';
       // $model->setScenario('create');
        $model->status = User::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post()) && $model->save(User::ROLE_MANAGER)) {

            $profile->load(Yii::$app->request->post());
            $this->UpdateUserRelatedTbls($model,$profile);

            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('backend', 'Data has been saved Successfully') ,
                'title' =>'',
            ]);


            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'profile' => $profile,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));
        $profile= $model->getModel()->userProfile;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $profile->load(Yii::$app->request->post());
            $this->UpdateUserRelatedTbls($model,$profile);


            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('backend', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);

            return $this->redirect(['index']);
        }


        return $this->render('update', [
            'model' => $model,
            'profile' => $profile,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name'),
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->revokeAll($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Action to load a tabular form grid
     * for StudentCertificate
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddStudentCertificate()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('StudentCertificate');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formStudentCertificate', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for StudentTestResults
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddStudentTestResults()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('StudentTestResults');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formStudentTestResults', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }





    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function UpdateUserRelatedTbls($model,$profile,$post_data=null){
        $prof= $model->getModel()->userProfile;
        if(!$prof) {
            $prof = new UserProfile();
            $prof->user_id=$model->getId();
        }
        if(Yii::$app->session->get('UserRole') == User::ROLE_MANAGER){
            $prof->locale = 'en-US';
        }
        $prof->firstname = $profile->firstname ;
        $prof->lastname = $profile->lastname ;
        $prof->gender= $profile->gender;
        $prof->avatar_base_url= isset($profile->picture['base_url']) ? $profile->picture['base_url'] : null;
        $prof->avatar_path= isset($profile->picture['path'])? $profile->picture['path']: null ;
        $prof->save(false);

        return true ;
    }

}
