<?php

namespace backend\controllers;

use backend\models\Requests;
use backend\models\SchoolCourseSessionCost;
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
class SchoolCourseController extends BackendController
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
        $model->scenario  = 'create';
        $model->school_id = Yii::$app->session->get('schoolId');
        $schoolObj= Schools::find()->where(['id'=>Yii::$app->session->get('schoolId')])->one();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {

            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);

            $this->CalcWeekCost($model);

            return $this->redirect(['index']); // 'id' => $model->id
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

        if(!$model->schoolCourseSessionCosts){
          $schoolCourseSession = new SchoolCourseSessionCost();
          $schoolCourseSession->school_course_id = $id;
          $schoolCourseSession->save(false);
          $model->refresh();
        }
        // return var_dump(Yii::$app->request->post());
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('hr', 'Data has been updated Successfully') ,
                'title' =>'',
            ]);

            $this->CalcWeekCost($model);


            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'schoolObj' => $schoolObj,

            ]);
        }
    }


    public function CalcWeekCost($model){

        if($model->schoolCourseSessionCosts){
            foreach ($model->schoolCourseSessionCosts as $item) {
                if(!$item->week_cost && $item->session_cost){
                    $item->week_cost= floor($item->session_cost/$item->weeks_per_session);
                    $item->save(false);

                }
                if(! $item->no_of_sessions  ) $item->no_of_sessions  = 1;
                if($item->weeks_per_session){
                    $item->max_no_of_sessions =  floor(52/$item->weeks_per_session);
                    $item->save(false);
                }
            }

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
        //check if it has requests
        $requests = Requests::find()->where(['model_name'=>Requests::MODEL_NAME_COURSE , 'model_id'=>$id])->all();
        if(count($requests)){
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'danger',
                'body' => \Yii::t('backend', 'you can not delete this Course as some students applied on it') ,
                'title' =>'',
            ]);
        }else{
            Yii::$app->getSession()->setFlash('alert', [
                'type' =>'success',
                'body' => \Yii::t('backend', 'Course has been deleted.') ,
                'title' =>'',
            ]);

            $this->findModel($id)->deleteWithRelated();

        }

        return $this->redirect(['index']);
    }


    public function actionAddSchoolCourseSessionCost()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolCourseSessionCost');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolCourseSessionCost', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for SchoolCourseStartDate
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolCourseStartDate()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolCourseStartDate');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolCourseStartDate', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for SchoolCourseWeekCost
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddSchoolCourseWeekCost()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('SchoolCourseWeekCost');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSchoolCourseWeekCost', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
        }
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
