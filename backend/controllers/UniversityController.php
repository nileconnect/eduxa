<?php

namespace backend\controllers;

use Yii;
use backend\models\University;
use backend\models\search\UniversitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversityController implements the CRUD actions for University model.
 */
class UniversityController extends Controller
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

    /**
     * Displays a single University model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerUniversityAccreditedCountries = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityAccreditedCountries,
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
            'providerUniversityAccreditedCountries' => $providerUniversityAccreditedCountries,
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
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
     * 
     * Export University information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerUniversityAccreditedCountries = new \yii\data\ArrayDataProvider([
            'allModels' => $model->universityAccreditedCountries,
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

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerUniversityAccreditedCountries' => $providerUniversityAccreditedCountries,
            'providerUniversityPhotos' => $providerUniversityPhotos,
            'providerUniversityPrograms' => $providerUniversityPrograms,
            'providerUniversityVideos' => $providerUniversityVideos,
            'providerUnversityRating' => $providerUnversityRating,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
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
    
    /**
    * Action to load a tabular form grid
    * for UniversityAccreditedCountries
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddUniversityAccreditedCountries()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UniversityAccreditedCountries');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUniversityAccreditedCountries', ['row' => $row]);
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
            return $this->renderAjax('_formUniversityVideos', ['row' => $row]);
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
