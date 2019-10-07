<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\News;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faqs');
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
                    return $model->answer ? substr($model->answer,0,150).'...' :'لم يتم الاجابة بعد.';
                },
                'format'=>'raw'

            ],
            [
                'attribute' => 'cat_id',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return   $model->cat->title;
                },
                'filter' => Html::activeDropDownList($searchModel, 'cat_id',
                    ArrayHelper::map(\backend\models\FaqCat::find()->where('status =1')->all(),'id','title'),['class'=>'form-control',
                    'prompt' =>  Yii::t('app','Select') ]),
            ],


            [
                'attribute' => 'status',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return News::getStatusList()[$model->status];
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', (News::getStatusList()),['class'=>'form-control',
                    'prompt' =>  Yii::t('app','Select Status') ]),
            ],
            [
                'attribute'=>'created_by',
                'value'=>function($model){
                    return $model->created_by ? $model->createdBy->fullName : 'زائر' ;
                },

            ],
            //'updated_by',
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
