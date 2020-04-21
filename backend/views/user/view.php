<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->getPublicIdentity();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?php  // echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'label'=>'Name',
                     'value'=>function($model){
                        return $model->userProfile->fullName ;
                     }
            ],
            //'auth_key',
            'email:email',

            [
                'attribute' => 'status',
                'value' => function($model){
                    return User::statuses()[$model->status];
                },
                'format'=>'raw',
            ],

            'created_at:datetime',
            //'updated_at:datetime',
            'logged_at:datetime',
        ],
    ]) ?>


    <hr/>

    <?php echo DetailView::widget([
        'model' => $model->userProfile,
        'attributes' => [

            'firstname',
            'lastname',
            'mobile',

            [
                'attribute' => 'country_id',
                'value' => function($model){
                    return $model->country_id ?  $model->country->title : '' ;
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'state_id',
                'value' => function($model){
                    return $model->state_id ?  $model->state->title : '' ;
                },
                'format'=>'raw',
            ],

            [
                'attribute' => 'city_id',
                'value' => function($model){
                    return $model->city_id ?  $model->city->title : '' ;
                },
                'format'=>'raw',
            ],
// ///////////////////////////////////////////////////
            [
                'attribute' => 'no_of_students',
                'value' => function($model){
                    return $model->no_of_students  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],

            [
                'attribute' => 'expected_no_of_students',
                'value' => function($model){
                    return $model->expected_no_of_students  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],
            [
                'attribute' => 'students_nationalities',
                'value' => function($model){
                    return $model->students_nationalities  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],

// ////////////////////////////////////

            [
                'attribute' => 'communtication_channel',
                'value' => function($model){
                    return $model->communtication_channel  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],
            [
                'attribute' => 'find_us_from',
                'value' => function($model){
                    return $model->find_us_from  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],

            //**************************//
            [
                'attribute' => 'interested_in_schools',
                'value' => function($model){
                    return $model->interested_in_schools  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],
            [
                'attribute' => 'interested_in_university',
                'value' => function($model){
                    return $model->interested_in_university  ;
                },
                'format'=>'raw',
                //'visible'=>,
            ],


        ],
    ]) ?>




</div>
