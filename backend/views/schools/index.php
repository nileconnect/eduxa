<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SchoolsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Schools');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="schools-index">
    <p>
        <?= Html::a(Yii::t('backend', 'Create School'), ['create'], ['class' => 'btn btn-success']) ?>
        <?  //= Html::a(Yii::t('backend', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'title',

        [
            'label'=>'Courses',
            'format'=>'raw',
            'value' => function ($model) {
                return '<a  class="btn btn-success" href="/school-course?school_id='.$model->id.'">Manage Courses </a>';

            }
        ],


        // 'details:ntext',
         'featured:boolean',
       // 'location',
        //'lat',
        //'lng',
        //'image_base_url:url',
        //'image_path',
//        'country_id',
//        'city_id',
//        'min_age',
//        'start_every',
//        'study_time',
//        'max_students_per_class',
//        'avg_students_per_class',
//        'lessons_per_week',
//        'hours_per_week',
//        'accomodation_fees',
//        'registeration_fees',
//        'study_books_fees',
//        'fees_per_week',
//        'discount',
//        'total_rating',
        'status:boolean',
        [
            'class' => 'yii\grid\ActionColumn',
            // 'template'=>'{view} {update}'
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-schools']],
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
