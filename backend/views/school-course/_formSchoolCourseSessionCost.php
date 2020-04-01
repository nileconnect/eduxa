<div class="form-group" id="add-school-course-session-cost">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'SchoolCourseSessionCost',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'weeks_per_session' => ['type' => TabularForm::INPUT_TEXT],
        'no_of_sessions' => ['type' => TabularForm::INPUT_TEXT],
        'session_cost' => ['label'=>'Price/Session','type' => TabularForm::INPUT_TEXT],
        'week_cost' => ['label'=>'Price/Week', 'type' => TabularForm::INPUT_TEXT],
        'status' => [
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' =>[
                    '1'=>'Active',
                    '0'=> 'Not active',
                ],
                //'options' => ['placeholder' => 'Select'],
            ],
            'columnOptions' => ['width' => '200px']
        ],

        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowSchoolCourseSessionCost(' . $key . '); return false;', 'id' => 'school-course-session-cost-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add New Session'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSchoolCourseSessionCost()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

