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
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'username',
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

//            [
//                'attribute' => 'country_id',
//                'value' => function($model){
//                    return $model->country_id ?  $model->country->name : '' ;
//                },
//                'format'=>'raw',
//            ],
//
//            [
//                'attribute' => 'city_id',
//                'value' => function($model){
//                    return $model->city_id ?  $model->states->name : '' ;
//                },
//                'format'=>'raw',
//            ],



        ],
    ]) ?>




</div>
