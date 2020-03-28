<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('backend', 'School Room Category');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-room-category-index">


    <p>
        <?= Html::a(Yii::t('backend', 'Create School Room Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
//        [
//                'attribute' => 'school_id',
//                'label' => Yii::t('backend', 'School'),
//                'value' => function($model){
//                    if ($model->school)
//                    {return $model->school->title;}
//                    else
//                    {return NULL;}
//                },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Schools::find()->asArray()->all(), 'id', 'title'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'Schools', 'id' => 'grid--school_id']
//            ],
        'title',
        [
            'class' => 'yii\grid\ActionColumn',
        'template'=>'{view} {update}'
              ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-room-category']],
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
