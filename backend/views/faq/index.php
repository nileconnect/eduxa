<?php

use backend\models\Country;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\News;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Country::findOne(Yii::$app->session->get('countryId'))->title . ' - '. Yii::t('app', 'Faqs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">
    <p>
        <?= Html::a(Yii::t('app', 'Create Faq'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'question',
            [
                'attribute'=>'answer',
                'value'=>function($model){
                    return $model->answer ? substr($model->answer,0,150).'...' :'-';
                },
                'format'=>'raw'

            ],

            [
                'attribute' => 'status',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return \backend\models\Faq::getStatusList()[$model->status];
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', (\backend\models\Faq::getStatusList()),['class'=>'form-control',
                    'prompt' =>  Yii::t('app','Select Status') ]),
            ],
            [
                'attribute'=>'created_by',
                'value'=>function($model){
                    return  $model->createdBy->userProfile->fullName  ;
                },

            ],
            //'updated_by',
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
