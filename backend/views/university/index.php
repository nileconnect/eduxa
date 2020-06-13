<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Universities');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);


echo newerton\fancybox3\FancyBox::widget([

    'config'=>[
        'iframe' => [

            'preload'       => false,
            'css'=>[
                'width'=>'900px',
                'height'=>'500px'
            ]
        ],

    ],
]);


?>
<div class="university-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create University'), ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Import Data'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>

    <div class="search-form" style="display:none">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a class="uploadBtn" data-fancybox="" data-type="iframe"   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "900px" , "height" : "400px" }}}'
                   href="/import/universities">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Import Countries</span></a><br/>

            </div>
        </div>
    </div>

    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'title',


        [
            'attribute' => 'responsible_id',
            'value'=>function ($model) {
                $creator =   $model->responsible_id ? $model->responsible->getPublicIdentity() : 'Assign';

                return  ' <a class="btn btn-info" data-src="/university/manager?id='.$model->id.'" data-fancybox data-type="iframe" href="javascript:;" >'.$creator.'</a> ' ;
            },
            'format' => 'raw',
        ],


        [
            'label'=>'Programs',
            'format'=>'raw',
            'value' => function ($model) {
                return '<a  class="btn btn-success"  href="/university-programs?university_id='.$model->id.'">Manage Programs </a>';

            }
        ],


        'total_rating',
        'recommended:boolean',
        [
            'class' => 'yii\grid\ActionColumn','template'=>'{view} {update}'
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-university']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
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
            ]) ,
        ],
    ]); ?>

</div>
