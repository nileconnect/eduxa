<?php

namespace backend\controllers;

use backend\models\School;
use backend\models\search\RequestsSearch;
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

        return $this->render('users');
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
