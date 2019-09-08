<?php

namespace backend\controllers;

use Yii;
use backend\models\City;
use backend\models\search\CitySearch;
use backend\controllers\BackendController;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CityController implements the CRUD actions for City model.
 */
class CityController extends BackendController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['admin', 'superAdmin'],
                    ],

                    [
                        'actions' => ['create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['superAdmin','admin'],
                    ]

                ],
            ],

        ];
    }


    /**
     * Lists all City models.
     * @param integrer $countryId Country id
     * @return mixed
     */
    public function actionIndex()
    {
        if(isset($_REQUEST['countryId'])){
            Yii::$app->session->set('CountryID',$_REQUEST['countryId']);
        }
        $searchModel = new CitySearch();
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
     * Displays a single City model.
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
     * Creates a new City model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integrer $countryId Country id
     * @return mixed
     */
    public function actionCreate()
    {
        if(isset($_REQUEST['countryId'])){
            Yii::$app->session->set('CountryID',$_REQUEST['countryId']);
        }

        $model = new City();
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
     * Updates an existing City model.
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
     * Deletes an existing City model.
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
     * Finds the City model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return City the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = City::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
