<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RequestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('backend', 'Requests Report');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="requests-index">
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="search-form" > <? /* style="display:none" */?>
        <?=$this->render('_RequestSearch', ['model' => $searchModel]);?>
    </div>

</div>

<?php
$gridColumn = [
    // ['class' => 'yii\grid\SerialColumn'],
    ['attribute' => 'id',
        'value' => function ($model) {
            return \backend\models\Requests::ListRequestStartNo()[$model->request_by_role] . $model->id;
        },

    ],
    [
        'label' => 'Student Name',
        'value' => function ($model) {
            return $model->student_first_name . ' ' . $model->student_last_name;
        },
    ],
    [
        'attribute' => 'model_name',
        'value' => function ($model) {
            return $model->modelObj->title;
        },

    ],

    [
        'attribute' => 'model_parent_id',
        'value' => function ($model) {
            return $model->modelParentObj->title;
        },

    ],
    [
        'label' => 'User Type',
        'attribute' => 'request_by_role',
        'value' => function ($model) {
            return \backend\models\Requests::ListRequestBy()[$model->request_by_role];
        },
    ],
    [
        'label' => 'Start Date Of Study',
        'attribute' => 'start_date_of_Study',
        'value' => function ($model) {
            return $model->modelObj && isset($model->modelObj->first_submission_date)? $model->modelObj->first_submission_date : ' ';
        },
    ],
    [
        'label' => 'Study Duration',
        'attribute' => 'study_duration',
        'value' => function ($model) {
            return $model->modelObj && isset($model->modelObj->study_duration) ? $model->modelObj->study_duration :'';
        },
    ],
    [
        'attribute' => 'requester_id',
        'label' => Yii::t('backend', 'Requester'),
        'value' => function ($model) {
            return $model->requester->username;
        },
    ],
    [
        'attribute' => 'student_nationality_id',
        'label' => Yii::t('backend', 'Nationality'),
        'value' => function ($model) {
            if ($model->student_nationality_id) {return $model->student_nationality_id;} else {return null;}
        },
    ],
    [
        'attribute' => 'student_country_id',
        'label' => Yii::t('backend', 'Country'),
        'value' => function ($model) {
            if ($model->studentCountry) {return $model->studentCountry->title;} else {return null;}
        },
    ],
    [
        'attribute' => 'student_city_id',
        'label' => Yii::t('backend', 'State'),
        'value' => function ($model) {
            if ($model->studentCity) {return $model->studentCity->title;} else {return null;}
        },
    ],

    [
        'attribute' => 'accomodation_option',
        'label' => Yii::t('backend', 'Accomodation'),
        'value' => function ($model) {
            return $model->accomodation_option;
        },
    ],
    [
        'attribute' => 'airport_pickup',
        'label' => Yii::t('backend', 'Airport'),
        'value' => function ($model) {
            return $model->airport_pickup;
        },
    ],

    [
        'attribute' => 'created_at',
        'format' => 'date',
    ],
    [
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function ($model) {
            return \backend\models\Requests::ListStatus()[$model->status];
        },
    ],
    // [
    //     'class' => '\kartik\grid\CheckboxColumn',
    //     'rowSelectedClass' => GridView::TYPE_INFO,
    //     'name' => 'Expedientes_Seleccionados',
    // ],
    // [
    //     'class' => 'yii\grid\ActionColumn', 'template' => '{view}',
    // ],
];

// [
//     'request_notes',
//     'admin_notes',
//     [
//         'attribute' => 'student_gender',
//         'value' => function ($model) {
//             return \common\models\UserProfile::ListGender()[$model->student_gender];
//         },
//         'format' => 'raw',
//     ],
//     'student_mobile',
//     'student_email',
//     'accomodation_option',
//     'accomodation_option_cost',
//     'airport_pickup',
//     'airport_pickup_cost',
//     'course_start_date',
//     'number_of_weeks',

// ] +
$gridColumnExport = ['request_notes', 'admin_notes'] + $gridColumn
?>


<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => $gridColumn,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-requests']],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
    ],
    // your toolbar can include the additional full export menu
    'toolbar' => [
        // '{export}',
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumnExport,
            'target' => ExportMenu::TARGET_BLANK,
            'fontAwesome' => true,
            // 'dropdownOptions' => [
            //     'label' => 'Full',
            //     'class' => 'btn btn-default',
            //     'itemsBefore' => [
            //         '<li class="dropdown-header">Export All Data</li>',
            //     ],
            // ],
        ]),
    ],
]);

$this->registerJs(
    "$('#myButton').on('click', function() {  var keys = $('#grid').yiiGridView('getSelectedRows');  alert('Button eee!'+ keys); });"
);

?>

