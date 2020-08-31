<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RequestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;

$this->title = Yii::t('backend', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);

$requesterFilter = \yii\helpers\ArrayHelper::map(
    \common\models\User::find()->join('LEFT JOIN', '{{%rbac_auth_assignment}}', '{{%rbac_auth_assignment}}.user_id = {{%user}}.id')
        ->andFilterWhere(['{{%rbac_auth_assignment}}.item_name' => 'user'])
        ->orFilterWhere(['{{%rbac_auth_assignment}}.item_name' => 'referralPerson'])
        ->orFilterWhere(['{{%rbac_auth_assignment}}.item_name' => 'referralCompany'])
        ->asArray()->all()
    , 'id', 'username') ;

?>
<div class="requests-index">
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <? // = Html::a(Yii::t('backend', 'Create Requests'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('backend', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

</div>
<div class="requests-index">
<?=Html::beginForm(['requests/index'],'post');?>
Change Requests Status :
<?=Html::dropDownList('action','', \backend\models\Requests::ListStatus() ,['class'=>'dropdown',])?>
<?=Html::submitButton('Update Requests', ['class' => 'btn btn-info',]);?>
</div>


<?php
$gridColumn = [
   // ['class' => 'yii\grid\SerialColumn'],

    ['attribute' => 'id',
        'value' =>function($model){
            return  \backend\models\Requests::ListRequestStartNo()[$model->request_by_role] . $model->id;
        }

    ],
    [
        'attribute' => 'model_name',
        'value' => function($model){
            return  $model->modelObj->title;
        },

    ],

    [
        'attribute' => 'model_parent_id',
        'value' => function($model){
            return   $model->modelParentObj->title;
        },

    ],
    [
        'attribute' => 'request_by_role',
        'value' => function($model){
            return \backend\models\Requests::ListRequestBy()[$model->request_by_role];
        },
        'filter' => Html::activeDropDownList($searchModel, 'request_by_role', \backend\models\Requests::ListRequestBy() ,['class'=>'form-control','prompt' => 'Select']),
    ],


    //  'student_id',
    [
        'attribute' => 'requester_id',
        'label' => Yii::t('backend', 'Requester'),
        'value' => function($model){
            return $model->requester->username;
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(
            \common\models\User::find()->join('LEFT JOIN', '{{%rbac_auth_assignment}}', '{{%rbac_auth_assignment}}.user_id = {{%user}}.id')
            ->andFilterWhere(['{{%rbac_auth_assignment}}.item_name' => 'user'])
            ->orFilterWhere(['{{%rbac_auth_assignment}}.item_name' => 'referralPerson'])
            ->orFilterWhere(['{{%rbac_auth_assignment}}.item_name' => 'referralCompany'])
            ->asArray()->all()
            , 'id', 'username'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-requests-search-requester_id']
    ],
    // 'request_notes:ntext',
    //   'admin_notes:ntext',
    'student_first_name',
    'student_last_name',
    // 'student_gender',
    //  'student_email:email',
    //   'student_mobile',
    [
        'attribute' => 'student_country_id',
        'label' => Yii::t('backend', 'Student Country'),
        'value' => function($model){
            if ($model->studentCountry)
            {return $model->studentCountry->title;}
            else
            {return NULL;}
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->asArray()->all(), 'id', 'title'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Country', 'id' => 'grid-requests-search-student_country_id']
    ],
    [
        'attribute' => 'student_city_id',
        'label' => Yii::t('backend', 'Student State'),
        'value' => function($model){
            if ($model->studentCity)
            {return $model->studentCity->title;}
            else
            {return NULL;}
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(\backend\models\State::find()->asArray()->all(), 'id', 'title'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'State', 'id' => 'grid-requests-search-student_city_id']
    ],

    [
        'attribute' => 'student_nationality_id',
        'value' => function($model){
            return $model->student_nationality_id;
        },
    ],
    //  'accomodation_option',
    //   'accomodation_option_cost',
    //    'airport_pickup',
    //    'airport_pickup_cost',
    //    'course_start_date',
    //     'number_of_weeks',
    [
        'attribute' => 'created_at',
        //  'format' => 'date'
    ],
    [
        'attribute'=>'status',
        'format'=>'raw',
        'value'=>function($model){
            return   \backend\models\Requests::ListStatus()[$model->status];
        },
        'filter' => Html::activeDropDownList($searchModel, 'status', \backend\models\Requests::ListStatus() ,['class'=>'form-control','prompt' => 'Select']),
    ],



    [
        'class' => '\kartik\grid\CheckboxColumn',
        'rowSelectedClass' => GridView::TYPE_INFO,
        'name' => 'Expedientes_Seleccionados',

    ],
    [
        'class' => 'yii\grid\ActionColumn','template'=>'{view}'
    ],
];

$gridColumnExport=[
        'request_notes' ,
        'admin_notes',
        [
            'attribute'=>'student_gender',
            'value'=>function($model){
                return  \common\models\UserProfile::ListGender()[$model->student_gender];
            },
            'format'=>'raw'
        ],
        'student_mobile',
        'student_email' ,
        'accomodation_option',
        'accomodation_option_cost',
        'airport_pickup',
        'airport_pickup_cost',
        'course_start_date',
        'number_of_weeks',

    ]+$gridColumn
?>


<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumn,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-requests']],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
    ],
    'exportConfig'=>[
        GridView::CSV => [],
        GridView::EXCEL => [],
    ],
    // your toolbar can include the additional full export menu
    'toolbar' => [
        '{export}',
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumn,
            'target' => ExportMenu::TARGET_BLANK,
            'exportConfig' => [
                ExportMenu::FORMAT_EXCEL => false,
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false,
                ExportMenu::FORMAT_HTML => false,
             ],
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
]);

$this->registerJs(
    "$('#myButton').on('click', function() {  var keys = $('#grid').yiiGridView('getSelectedRows');  alert('Button eee!'+ keys); });"
);



?>

