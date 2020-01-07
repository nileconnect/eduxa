<?php

namespace backend\controllers;

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

    /**
     * Deletes an existing Schools model.
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
            return $this->renderAjax('_formSchoolVideos', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

}
