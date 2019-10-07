<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaqCatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Faq Cats');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-cat-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Faq Cat'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'title',
            [
                'attribute' => 'status',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return \backend\models\Faq::getStatusList()[$model->status];
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', (\backend\models\Faq::getStatusList()),['class'=>'form-control',
                    'prompt' =>  Yii::t('app','Select Status') ]),
            ],

            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn' , 'template'=>'{view}{update}'],
        ],
    ]); ?>
</div>
