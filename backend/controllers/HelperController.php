<?php

namespace backend\controllers;

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
class HelperController extends   BackendController
{
    //Users
    public function actionUsersList($q = null, $id = null) {
        $role = Yii::$app->session->get('UserRole');
        $q = preg_replace('/\s+/', '', $q);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            //$users= User::find()
            $query = new Query();
            $query->select(' CONCAT_WS(" ", `firstname`, `lastname`) as text, user_profile.user_id as id')
                ->from('user_profile')
                ->join('LEFT JOIN','rbac_auth_assignment','rbac_auth_assignment.user_id = user_profile.user_id ')
                ->where('CONCAT( `firstname`, `lastname`) LIKE  \'%'.$q.'%\'   and rbac_auth_assignment.item_name ="'.$role.'" ' )
                ->limit(20);

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => UserProfile::find($id)->fullName];
        }
        return $out;
    }


    public function  actionUsersListByRole($q = null, $id = null,$role=User::ROLE_UNIVERSITY_MANAGER) {

        $q = preg_replace('/\s+/', '', $q);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            //$users= User::find()
            $query = new Query();
            $query->select(' CONCAT_WS(" ", `firstname`, `lastname`) as text, user_profile.user_id as id')
                ->from('user_profile')
                ->join('LEFT JOIN','rbac_auth_assignment','rbac_auth_assignment.user_id = user_profile.user_id ')
                ->where('CONCAT( `firstname`, `lastname`) LIKE  \'%'.$q.'%\'   and rbac_auth_assignment.item_name ="'.$role.'" ' )
                ->limit(20);

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => UserProfile::find($id)->fullName];
        }
        return $out;

    }


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
