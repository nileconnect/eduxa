<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UniversityProgramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Programs') . ' of '.$universityObj->title ;
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
<div class="university-programs-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create University Programs'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('backend', 'Import Data'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>

    <div class="search-form" style="display:none">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <a class="uploadBtn" data-fancybox="" data-type="iframe"   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "900px" , "height" : "400px" }}}'
                   href="/import/universities-programs?university_id=<?= $universityObj->id ?>">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i><span>Import University Programs</span></a><br/>

            </div>
        </div>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
//        [
//                'attribute' => 'university_id',
//                'label' => Yii::t('backend', 'University'),
//                'value' => function($model){
//                    return $model->university->title;
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\University::find()->asArray()->all(), 'id', 'title'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'University', 'id' => 'grid-university-programs-search-university_id']
//            ],
        'title',
        [
                'attribute' => 'major_id',
                'label' => Yii::t('backend', 'Major'),
                'value' => function($model){                   
                    return $model->major->title;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->asArray()->all(), 'id', 'title'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'University program majors', 'id' => 'grid-university-programs-search-major_id']
            ],
        [
                'attribute' => 'degree_id',
                'label' => Yii::t('backend', 'Degree'),
                'value' => function($model){                   
                    return $model->degree->title;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->asArray()->all(), 'id', 'title'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'University program degree', 'id' => 'grid-university-programs-search-degree_id']
            ],
        [
                'attribute' => 'field_id',
                'label' => Yii::t('backend', 'Field'),
                'value' => function($model){
                    if ($model->field)
                    {return $model->field->title;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->asArray()->all(), 'id', 'title'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'University program field', 'id' => 'grid-university-programs-search-field_id']
            ],
//        'country_id',
//        'city_id',
//        'study_start_date',
//        'study_duration',
//        'study_method',
//        'attendance_type',
//        'annual_cost',
//        'conditional_admissions',
//        'toefl',
//        'ielts',
//        'bank_statment',
//        'high_school_transcript',
//        'bachelor_degree',
//        'certificate',
//        'note1:ntext',
//        'note2:ntext',
//        'total_rating',
//        'program_type',
        [
            'class' => 'yii\grid\ActionColumn','template'=>'{update}   {delete}'
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-university-programs']],
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
