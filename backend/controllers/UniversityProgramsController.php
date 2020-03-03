<?php

namespace backend\controllers;

use backend\models\base\University;
use Yii;
use backend\models\UniversityPrograms;
use backend\models\search\UniversityProgramsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversityProgramsController implements the CRUD actions for UniversityPrograms model.
 */
class UniversityProgramsController extends BackendController
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
     * Lists all UniversityPrograms models.
     * @return mixed
     */
    public function actionIndex($university_id)
    {
        if(isset($_REQUEST['university_id'])){
            Yii::$app->session->set('universityId',$_REQUEST['university_id']);
        }
        $universityObj= University::find()->where(['id'=>Yii::$app->session->get('universityId')])->one();

        $searchModel = new UniversityProgramsSearch();
        $searchModel->university_id =  Yii::$app->session->get('universityId');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'universityObj' => $universityObj,
        ]);
    }

    /**
     * Displays a single UniversityPrograms model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UniversityPrograms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UniversityPrograms();
        $model->university_id = Yii::$app->session->get('universityId');
        $universityObj = University::find()->where(['id'=>$model->university_id])->one();

        $model->country_id = $universityObj->country_id;
        $model->city_id = $universityObj->city_id;
        $model->state_id = $universityObj->state_id;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UniversityPrograms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->university_id = Yii::$app->session->get('universityId');
        $universityObj = University::find()->where(['id'=>$model->university_id])->one();
        $model->country_id = $universityObj->country_id;
        $model->city_id = $universityObj->city_id;
        $model->state_id = $universityObj->state_id;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UniversityPrograms model.
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
     * Finds the UniversityPrograms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UniversityPrograms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UniversityPrograms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }
}
