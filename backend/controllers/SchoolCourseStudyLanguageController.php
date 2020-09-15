<?php

namespace backend\controllers;

use backend\models\SchoolCourse;
use Yii;
use backend\models\SchoolCourseStudyLanguage;
use backend\models\search\SchoolCourseStudyLanguageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchoolCourseStudyLanguageController implements the CRUD actions for SchoolCourseStudyLanguage model.
 */
class SchoolCourseStudyLanguageController extends BackendController
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
     * Lists  SchoolCourseStudyLanguage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SchoolCourseStudyLanguageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SchoolCourseStudyLanguage model.
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
     * Creates a new SchoolCourseStudyLanguage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SchoolCourseStudyLanguage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SchoolCourseStudyLanguage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SchoolCourseStudyLanguage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $coursesCount = SchoolCourse::find()->where(['school_course_study_language_id'=>$id])->count();

        if($coursesCount > 0){
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'danger',
                'body' => \Yii::t('backend', 'You are not  allowed to delete '. $model->title .' because it is
                related to school.') ,
                'title' =>'',
            ]);
        }else{
            $this->findModel($id)->deleteWithRelated();
        }
        return $this->redirect(['index']);

    }

    
    /**
     * Finds the SchoolCourseStudyLanguage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SchoolCourseStudyLanguage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolCourseStudyLanguage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }
}
