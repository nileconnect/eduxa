<?php

namespace backend\controllers;

use backend\models\base\SchoolsV;
use Yii;
use backend\models\Schools;
use backend\models\search\SchoolsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class SchoolsController extends BackendController
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

    /**
     * Lists all Schools models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schools model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $providerSchoolAccomodation = new \yii\data\ArrayDataProvider([
            'allModels' => $model->schoolAccomodations,
        ]);
        $providerSchoolAirportPickup = new \yii\data\ArrayDataProvider([
            'allModels' => $model->schoolAirportPickups,
        ]);
        $providerSchoolCourse = new \yii\data\ArrayDataProvider([
            'allModels' => $model->schoolCourses,
        ]);
        $providerSchoolPhotos = new \yii\data\ArrayDataProvider([
            'allModels' => $model->schoolPhotos,
        ]);
        $providerSchoolRating = new \yii\data\ArrayDataProvider([
            'allModels' => $model->schoolRatings,
        ]);
        $providerSchoolVideos = new \yii\data\ArrayDataProvider([
            'allModels' => $model->schoolVideos,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerSchoolAccomodation' => $providerSchoolAccomodation,
            'providerSchoolAirportPickup' => $providerSchoolAirportPickup,
            'providerSchoolCourse' => $providerSchoolCourse,
            'providerSchoolPhotos' => $providerSchoolPhotos,
            'providerSchoolRating' => $providerSchoolRating,
            'providerSchoolVideos' => $providerSchoolVideos,
        ]);
    }

    /**
     * Creates a new Schools model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Schools();

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
     * Updates an existing Schools model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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


    public function actionMedia()
    {
        // $this->layout ='base';

        $searchModel = new SchoolsSearch();
        $dataProvider = $searchModel->mediaSearch(Yii::$app->request->queryParams);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
                'school_logo' => [
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

        $model = SchoolsV::findOne($id);
        if(! $model) throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        $saved= false;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);
            $saved= true;
        }
        return $this->render('forms/videos', [
            'model' => $model,
            'saved'=>$saved
        ]);
    }


    /**
     * Deletes an existing Schools model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->schoolCourses){
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'danger',
                'body' => \Yii::t('backend', 'You can not be allowed to deleting '. $model->title .' because it is
                related to courses.') ,
                'title' =>'',
            ]);
        }else{
            $this->findModel($id)->deleteWithRelated();
        }
        return $this->redirect(['index']);
    }


    /**
     * Finds the Schools model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schools the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schools::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }


    /**
     * Action to load a tabular form grid
     * for SchoolAccomodation
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolAccomodation()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolAccomodation');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolAccomodation', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for SchoolAirportPickup
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolAirportPickup()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolAirportPickup');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolAirportPickup', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for SchoolCourse
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolCourse()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolCourse');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolCourse', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for SchoolRating
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolRating()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolRating');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolRating', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for SchoolVideos
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolVideos()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolVideos');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('forms/_formSchoolVideos', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

}
