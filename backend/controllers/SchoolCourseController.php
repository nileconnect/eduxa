<?php

namespace backend\controllers;

use backend\models\Schools;
use Yii;
use backend\models\SchoolCourse;
use backend\models\search\SchoolCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchoolCourseController implements the CRUD actions for SchoolCourse model.
 */
class SchoolCourseController extends Controller
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
     * Lists all SchoolCourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(isset($_REQUEST['school_id'])){
            Yii::$app->session->set('schoolId',$_REQUEST['school_id']);
        }
        $searchModel = new SchoolCourseSearch();
        $searchModel->school_id = Yii::$app->session->get('schoolId');
        $schoolObj= Schools::find()->where(['id'=>Yii::$app->session->get('schoolId')])->one();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'schoolObj' => $schoolObj,
        ]);
    }

    /**
     * Displays a single SchoolCourse model.
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
     * Creates a new SchoolCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SchoolCourse();
        $model->school_id = Yii::$app->session->get('schoolId');
        $schoolObj= Schools::find()->where(['id'=>Yii::$app->session->get('schoolId')])->one();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'schoolObj' => $schoolObj,

            ]);
        }
    }

    /**
     * Updates an existing SchoolCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $schoolObj= Schools::find()->where(['id'=>$model->school_id])->one();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'schoolObj' => $schoolObj,

            ]);
        }
    }

    /**
     * Deletes an existing SchoolCourse model.
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
     * Finds the SchoolCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SchoolCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolCourse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }
}
