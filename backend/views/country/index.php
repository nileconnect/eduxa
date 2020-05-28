<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Country');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="country-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Country'), ['create'], ['class' => 'btn btn-primary']) ?>
        <? //= Html::a(Yii::t('backend', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
            'label' => '',
            'value' => function($model){
                return Html::a(Yii::t('app', 'states'), ['states/index', 'countryId'=>$model->id], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'states')]);
            },
            'format' => 'raw'
        ],

        [
            'label' => '',
            'value' => function($model){
                return Html::a(Yii::t('app', 'Faqs'), ['faq/index', 'countryId'=>$model->id], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'FAQs')]);
            },
            'format' => 'raw'
        ],

        [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'status',
            'editableOptions'=>[
                'header'=>'Status',
                'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                'data'=>['1'=>'Yes' , '0'=>'No'],
                'formOptions' => [
                    'action' => \yii\helpers\Url::to(['/country/update-item'])
                ]
            ],
            'value'=>function($model){
                return $model->status ? 'Yes' :'No';
            },
            'filter' => Html::activeDropDownList($searchModel, 'status', ['1'=>'Yes' , '0'=>'No'] ,['class'=>'form-control','prompt' =>  'Select']),

        ],
        [
            'class'=>'kartik\grid\EditableColumn',
            'attribute'=>'top_destination',
            'editableOptions'=>[
                'header'=>'Top Destination',
                'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                'data'=>['1'=>'Yes' , '0'=>'No'],
                'formOptions' => [
                    'action' => \yii\helpers\Url::to(['/country/update-item'])
                ]
            ],
            'value'=>function($model){
                return $model->top_destination ? 'Yes' :'No';
            },
             'filter' => Html::activeDropDownList($searchModel, 'top_destination', ['1'=>'Yes' , '0'=>'No'] ,['class'=>'form-control','prompt' =>  'Select']),

        ],
            [
                    'class' => 'yii\grid\ActionColumn','template'=>'{update} {view}'
            ],
        ];

    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-country']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
