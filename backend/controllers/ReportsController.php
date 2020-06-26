<?php

namespace backend\controllers;

use backend\models\School;
use backend\models\search\RequestsSearch;
use backend\models\search\UserSearch;
use Yii;

/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class ReportsController extends BackendController
{

    public function actionGeneral()
    {

        return $this->render('general');
    }

    public function actionUsers()
    {
        // return date('Y-m-d',strtotime('today - 1 year'));
        $searchModel = new UserSearch();
        $searchModel->report = true;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // return var_dump($searchModel);
        return $this->render('users', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionRequests()
    {

        $searchModel = new RequestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('requests', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

}
