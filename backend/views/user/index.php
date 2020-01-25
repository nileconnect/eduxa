<?php

use common\grid\EnumColumn;
use common\models\User;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;


use yii\web\JsExpression;


$url=\yii\helpers\Url::to(['/helper/users-list']);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \common\models\User::UserRoleName( Yii::$app->session->get('UserRole') ).'s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    if(Yii::$app->session->get('UserRole') != User::ROLE_USER){
        ?>
        <p>
            <?php echo Html::a(Yii::t('backend', 'Create New').' '.\common\models\User::UserRoleName( Yii::$app->session->get('UserRole') ), ['create'], ['class' => 'btn btn-primary']) ?>
        </p>

        <?
    }
    ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            //'id',
            ['class' => 'yii\grid\SerialColumn'],

            //'username',

            [
                'header'=> Yii::t('backend', 'Full Name') ,
                'attribute' => 'id',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return Html::a( $model->userProfile['fullName'], ['/user/view?id='.$model->id],['target'=>'_self']) ;
                },
                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>'',
                'filterWidgetOptions'=>[
                    'pluginOptions'=>[
                        'allowClear'=>true,
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(owner) { return owner.text; }'),
                        'templateSelection' => new JsExpression('function (owner) { return owner.text; }'),
                    ],

                ],
                'filterInputOptions'=>['placeholder'=>Yii::t('backend', 'Full Name')],

            ],

            'email:email',
            [
                'class' => EnumColumn::class,
                'attribute' => 'status',
                'enum' => User::statuses(),
                'filter' => User::statuses()
            ],




//            [
//                'attribute' => 'created_at',
//                'format' => 'datetime',
//                'filter' => DateTimeWidget::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'created_at',
//                    'phpDatetimeFormat' => 'dd.MM.yyyy',
//                    'momentDatetimeFormat' => 'DD.MM.YYYY',
//                    'clientEvents' => [
//                        'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
//                    ],
//                ])
//            ],
            [
                'attribute' => 'logged_at',
                'format' => 'datetime',
                'filter' => DateTimeWidget::widget([
                    'model' => $searchModel,
                    'attribute' => 'logged_at',
                    'phpDatetimeFormat' => 'dd.MM.yyyy',
                    'momentDatetimeFormat' => 'DD.MM.YYYY',
                    'clientEvents' => [
                        'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                    ],
                ])
            ],
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {view} {update}', //{login}   {delete}
                'buttons' => [
                    'login' => function ($url) {
                        return Html::a(
                            '<i class="fa fa-sign-in" aria-hidden="true"></i>',
                            $url,
                            [
                                'title' => Yii::t('backend', 'Login')
                            ]
                        );
                    },
                ],
                'visibleButtons' => [
                    'login' => Yii::$app->user->can('administrator')
                ]

            ],
        ],
    ]); ?>

</div>

