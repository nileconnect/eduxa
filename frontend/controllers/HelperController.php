<?php

namespace frontend\controllers;

use common\models\User;
use common\models\UserProfile;
use Yii;
use yii\web\Controller;


/**
 * SchoolsController implements the CRUD actions for Schools model.
 */
class HelperController extends   Controller
{
    //endpoints
    public function actionStates() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $country_id = $parents[0];

                $data = \backend\models\State::find()->where(['country_id'=>$country_id])->all();

                foreach ($data as $datum) {
                    $out[] = ['id'=>$datum->id, 'name'=>$datum->title];

                }
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }



    //endpoints
    public function actionCities() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $state_id = $parents[0];

                $data = \backend\models\Cities::find()->where(['state_id'=>$state_id])->all();

                foreach ($data as $datum) {
                    $out[] = ['id'=>$datum->id, 'name'=>$datum->title];

                }
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

}
