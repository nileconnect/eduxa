<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RequestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="requests-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <? // = Html::a(Yii::t('backend', 'Create Requests'), ['create'], ['class' => 'btn btn-success']) ?>
        <? // = Html::a(Yii::t('backend', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
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
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->asArray()->all(), 'id', 'username'),
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
                'label' => Yii::t('backend', 'Student City'),
                'value' => function($model){
                    if ($model->studentCity)
                    {return $model->studentCity->title;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\City::find()->asArray()->all(), 'id', 'title'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'City', 'id' => 'grid-requests-search-student_city_id']
            ],

        [
            'attribute' => 'student_nationality_id',
            'value' => function($model){
                if ($model->student_nationality_id)
                {return $model->studentNationality->title;}
                else
                {return NULL;}
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->asArray()->all(), 'id', 'title'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Nationality']
        ],
      //  'accomodation_option',
     //   'accomodation_option_cost',
    //    'airport_pickup',
    //    'airport_pickup_cost',
    //    'course_start_date',
   //     'number_of_weeks',
        [
            'attribute'=>'status',
            'format'=>'raw',
            'value'=>function($model){
                return   \backend\models\Requests::ListStatus()[$model->status];
            },
            'filter' => Html::activeDropDownList($searchModel, 'status', \backend\models\Requests::ListStatus() ,['class'=>'form-control','prompt' => 'Select']),
        ],

        [
            'attribute' => 'created_at',
            'format' => 'datetime',
            'filter' => \trntv\yii\datetime\DateTimeWidget::widget([
                'model' => $searchModel,
                'attribute' => 'created_at',
                'phpDatetimeFormat' => 'yyyy-MM-dd', //2019-10-25
                'momentDatetimeFormat' => 'yyyy-MM-dd',
                'clientEvents' => [
                    'dp.change' => new \yii\web\JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                ],
            ])
        ],
        [
            'class' => 'yii\grid\ActionColumn','template'=>'{view}'
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-requests']],
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
