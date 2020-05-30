<?php

namespace backend\controllers;

use backend\models\UniversityVidC;
use backend\models\UserForm;
use common\models\User;
use common\models\UserProfile;
use trntv\filekit\actions\DeleteAction;
use trntv\filekit\actions\UploadAction;
use Yii;
use backend\models\University;
use backend\models\search\UniversitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversityController implements the CRUD actions for University model.
 */
class UniversityController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
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
                }
            ],
            'avatar-delete' => [
                'class' => DeleteAction::class
            ]
        ];
    }
    /**
     * Lists all University models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UniversitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMedia()
    {
       // $this->layout ='base';

        $searchModel = new UniversitySearch();
        $dataProvider = $searchModel->mediaSearch(Yii::$app->request->queryParams);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
                'unversity_logo' => [
                    'asc' => ['image_path' => SORT_ASC],
                    'desc' => ['image_path' => SORT_DESC],
                    'label' => 'Logo',
                    'default' => SORT_ASC
                ],
               'imagesCount' => [
                    'asc' => ['imagesCount' => SORT_ASC],
                    'desc' => ['imagesCount' => SORT_DESC],
                    'label' => 'imagesCount',
                    'default' => SORT_ASC
                ],

                'videosCount' => [
                    'asc' => ['videosCount' => SORT_ASC],
                    'desc' => ['videosCount' => SORT_DESC],
                    'label' => 'videosCount',
                    'default' => SORT_ASC
                ],
            ]
        ]);



        return $this->render('media', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpdateLogo($id)
    {
        $this->layout ='base';
        $model = $this->findModel($id);
        $saved= false;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
            $saved= true;
        }
        return $this->render('forms/logo', [
            'model' => $model,
            'saved'=>$saved
        ]);
    }

    public function actionUpdatePictures($id)
    {
        $this->layout ='base';
        $model = $this->findModel($id);
        $saved= false;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
            $saved= true;
        }
        return $this->render('forms/pictures', [
            'model' => $model,
            'saved'=>$saved
        ]);
    }

    public function actionUpdateVideos($id)
    {
        $this->layout ='base';

        $model = UniversityVidC::findOne($id);
        if(! $model) throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        $saved= false;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            $extraMessage = '';
            foreach ($model->universityVideos as $universityVideo) {
                if(! $this->validateYoutube($universityVideo->base_url)){
                   $universityVideo->delete();
                   $extraMessage = ' -  but some videos are not valid urls';
                }
            }
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully'.$extraMessage) ,
                'title' =>'',
            ]);
            $saved= true;
        }
        return $this->render('forms/videos', [
            'model' => $model,
            'saved'=>$saved
        ]);
    }


    public function validateYoutube($yt_url)
    {
        // $yt_url = "https://www.youtube.com/watch?v=cCO2tPGa-dM";
        $url_parsed_arr = parse_url($yt_url);
        if ($url_parsed_arr['host'] == "www.youtube.com" && $url_parsed_arr['path'] == "/watch" && substr($url_parsed_arr['query'], 0, 2) == "v=" && substr($url_parsed_arr['query'], 2) != "") {
            return true;
        } else {
            return false;

        }
    }

    public function actionAssign($id){
        $this->layout = 'base';

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);

            return $this->render('assign', [
                'model' => $model,
                'saved'=>true
            ]);
        } else {

            return $this->render('assign', [
                'model' => $model,
            ]);
        }

    }

    public function actionManager($id)
    {
        $this->layout='base';

        $universityObj = $this->findModel($id);

        $model = new UserForm();
        if($universityObj->responsible_id){
            $model->setModel(User::findOne($universityObj->responsible_id));
            $profile= $model->getModel()->userProfile;
        }else{
            $profile = new UserProfile();
        }
        $model->roles = User::ROLE_UNIVERSITY_MANAGER;
        $saved = false;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $profile->load(Yii::$app->request->post());
            $this->UpdateUserRelatedTbls($model,$profile);
            University::updateAll(['responsible_id'=>$profile->user_id],['id'=>$id]);
            $university = University::findOne(['id'=>$id]);
            $university->responsible_id = $model->getModel()->id  ;
            if(!$university->save()){
                var_dump($university->errors);
            }
            $saved = true;
        }else{
           // return var_dump($model->errors);
        }

        return $this->render('manager', [
            'model' => $model,
            'profile' => $profile,
            'saved'=> $saved,
            'id'=>$id
        ]);
    }

    public function UpdateUserRelatedTbls($model,$profile){
        $prof= $model->getModel()->userProfile;
        if(!$prof) {
            $prof = new UserProfile();
            $prof->user_id = $model->getId();
        }
        $prof->locale= 'en-US';
        $prof->firstname = $profile->firstname ;
        $prof->lastname = $profile->lastname ;
        $prof->gender = $profile->gender;
        $prof->avatar_base_url = isset($profile->picture['base_url']) ? $profile->picture['base_url'] : null;
        $prof->avatar_path = isset($profile->picture['path'])? $profile->picture['path']: null ;
        $prof->save(false);
        return $prof;
    }


    /**
     * Displays a single University model.
     * @param integer $id
     * @return mixed
     */

    public function actionManagerView()
    {
        $model = $this->University;
        $providerUniversityCountries = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityCountries,
        ]);
        $providerUniversityPhotos = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityPhotos,
        ]);
        $providerUniversityPrograms = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityPrograms,
        ]);
        $providerUniversityVideos = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityVideos,
        ]);
        $providerUnversityRating = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unversityRatings,
        ]);
        return $this->render('view', [
            'model' => $model,
            'providerUniversityCountries' => $providerUniversityCountries,
            'providerUniversityPhotos' => $providerUniversityPhotos,
            'providerUniversityPrograms' => $providerUniversityPrograms,
            'providerUniversityVideos' => $providerUniversityVideos,
            'providerUnversityRating' => $providerUnversityRating,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        $providerUniversityCountries = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityCountries,
        ]);


        $providerUniversityPhotos = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityPhotos,
        ]);
        $providerUniversityPrograms = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityPrograms,
        ]);
        $providerUniversityVideos = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityVideos,
        ]);
        $providerUnversityRating = new \yii\data\ArrayDataProvider([
            'allModels' => $model->unversityRatings,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerUniversityCountries' => $providerUniversityCountries,
            'providerUniversityPhotos' => $providerUniversityPhotos,
            'providerUniversityPrograms' => $providerUniversityPrograms,
            'providerUniversityVideos' => $providerUniversityVideos,
            'providerUnversityRating' => $providerUnversityRating,
        ]);
    }

    /**
     * Creates a new University model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new University();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
          $model->CalcRating();


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing University model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionManagerUpdate()
    {
        $model = $this->University;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            $model->CalcRating();

            return $this->redirect(['manager-view']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            $model->CalcRating();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing University model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }



    /**
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return University the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    public function actionAddUniversityCountries()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UniversityCountries');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUniversityCountries', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
    * Action to load a tabular form grid
    * for UniversityPhotos
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUniversityPhotos()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UniversityPhotos');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUniversityPhotos', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
    * Action to load a tabular form grid
    * for UniversityPrograms
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUniversityPrograms()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UniversityPrograms');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUniversityPrograms', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
    * Action to load a tabular form grid
    * for UniversityVideos
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUniversityVideos()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UniversityVideos');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('forms/_formUniversityVideos', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
    * Action to load a tabular form grid
    * for UnversityRating
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUnversityRating()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UnversityRating');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUnversityRating', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }
}
