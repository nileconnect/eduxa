<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SchoolCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use  \backend\models\SchoolCourse;

$this->title = Yii::t('backend', 'School : ').' '. $schoolObj->title .' - Courses ';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="school-course-index">
    <p>
        <?= Html::a(Yii::t('backend', 'Add New Course'), ['create'], ['class' => 'btn btn-success']) ?>
        <? //= Html::a(Yii::t('backend', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
//        [
//                'attribute' => 'school_id',
//                'label' => Yii::t('backend', 'School'),
//                'value' => function($model){
//                    return $model->school->title;
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Schools::find()->asArray()->all(), 'id', 'title'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'Schools', 'id' => 'grid-school-course-search-school_id']
//            ],
        'title',
        [
            'attribute'=>'course_start_every',
            'format'=>'raw',
            'value'=>function($model){
                return  MyWeekDays()[$model->course_start_every];
            },
            'filter' => Html::activeDropDownList($searchModel, 'course_start_every',  MyWeekDays() ,['class'=>'form-control','prompt' => 'Select']),
        ],
      //  'information:ntext',
      //  'requirments:ntext',
        'lessons_per_week',
        'hours_per_week',
        //'min_no_of_students_per_class',
        //'avg_no_of_students_per_class',
       // 'min_age',
        [
            'attribute'=>'required_level',
            'format'=>'raw',
            'value'=>function($model){
                return  SchoolCourse::ListLevels()[$model->required_level];
            },
            'filter' => Html::activeDropDownList($searchModel, 'required_level', SchoolCourse::ListLevels() ,['class'=>'form-control','prompt' => 'Select']),


        ],
       // 'time_of_course:datetime',
       // 'registeration_fees',
        'cost_per_week',
        'no_of_weeks',
        'discount',
        'status:boolean',
       // 'required_attendance_duraion',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-course']],
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
