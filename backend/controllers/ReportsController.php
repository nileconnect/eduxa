<?php

namespace backend\controllers;

use backend\models\search\RequestsSearch;
use common\models\User;
use common\models\UserProfile;
use Yii;
use common\models\City;
use backend\models\CompetitionPath;
use common\models\District;
use backend\models\Govenment;
use backend\models\School;
use backend\models\SchoolsCompetition;
use common\models\lookup\Country;
use yii\db\Query;
use yii\helpers\Json;
use yii\web\Response;

/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class ReportsController extends   BackendController
{

    public function actionGeneral(){

       return  $this->render('general');
    }

    public function actionUsers(){

        return  $this->render('users');
    }


    public function actionRequests(){

        $searchModel = new RequestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('requests', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

}