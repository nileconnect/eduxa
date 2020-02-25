<?php

namespace backend\controllers;

use Yii;
use backend\models\State;
use backend\models\search\StateSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StatesController implements the CRUD actions for State model.
 */
class StatesController extends BackendController
{

   /**
     * Lists all State models.
     * @param integrer $countryId Country id
     * @return mixed
     */
    public function actionIndex()
    {
        if(isset($_REQUEST['countryId'])){
            Yii::$app->session->set('CountryID',$_REQUEST['countryId']);
        }
        $searchModel = new StateSearch();
        $searchModel->country_id = Yii::$app->session->get('CountryID');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->setSort([
            'defaultOrder' => ['sort' => SORT_ASC],
        ]);
        $country = \backend\models\Country::findOne(Yii::$app->session->get('CountryID'));
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'country' => $country,
        ]);
    }

    /**
     * Displays a single State model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new State model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integrer $countryId Country id
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new State();
        $model->country_id = Yii::$app->session->get('CountryID');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'countryId' => $model->country_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing State model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'countryId' => $model->country_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing State model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $id= $model->country_id ;
        $model->delete();
        return $this->redirect(['index', 'countryId' => $id]);
    }

    /**
     * Finds the State model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return state the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = State::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
