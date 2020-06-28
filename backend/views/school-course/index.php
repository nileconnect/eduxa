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
<div class="school-course-index">
    <p>
        <?= Html::a(Yii::t('backend', 'Add New Course'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('backend', 'Import Data'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a class="uploadBtn" data-fancybox="" data-type="iframe"   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "900px" , "height" : "400px" }}}'
                   href="/import/schools-courses">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Import Courses</span></a><br/>
            </div>
        </div>
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

      //  'information:ntext',
      //  'requirments:ntext',
        'lessons_per_week',
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

        'discount',
        'status:boolean',
       // 'required_attendance_duraion',
        [
            'class' => 'yii\grid\ActionColumn','template'=>'{view} {update} {delete}'
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
