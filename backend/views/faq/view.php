<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */

$this->title = $model->question;
$this->params['breadcrumbs'][] = ['label' =>  \backend\models\Country::findOne(Yii::$app->session->get('countryId'))->title .' - Faqs' , 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'question',
            [
                'attribute'=>'answer',
                'value'=>function($model){
                    return $model->answer;
                },
                'format'=>'raw'
            ],
            'status:boolean',
            [
                'attribute'=>'created_by',
                'value'=>function($model){
                    return $model->createdBy->userProfile->fullName ;
                },

            ],
            [
                'attribute'=>'updatedBy',
                'value'=>function($model){
                    return $model->updatedBy->userProfile->fullName ;
                },

            ],

            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
