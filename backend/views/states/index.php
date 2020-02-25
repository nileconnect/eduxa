<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $country->title.' - '.Yii::t('app', 'States');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create State'), ['create', 'countryId'=>$country->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',

            [
                'label' => '',
                'value' => function($model){
                    return Html::a(Yii::t('app', 'Cities'), ['cities/index', 'stateId'=>$model->id], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'Cities')]);
                },
                'format' => 'raw'
            ],
           // 'sort',
           // 'slug',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
