<div class="form-group" id="add-school-airport-pickup">
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
    'formName' => 'SchoolAirportPickup',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'title' => ['type' => TabularForm::INPUT_TEXT , 'label' => 'AirPort Title'],

        'service_type' => [
            'label' => 'Service Type',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => [\backend\models\Schools::AIRPORT_ONE_WAY =>'One Way', \backend\models\Schools::AIRPORT_TWO_WAY => 'Two Way'],
                'options' => ['placeholder' => Yii::t('common', 'Choose ..')],
            ],
            'columnOptions' => ['width' => '200px']
        ],

        'cost' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Cost',
            'options'=>['type' => 'number' ,'step'=>'any']
        ],

        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowSchoolAirportPickup(' . $key . '); return false;', 'id' => 'school-airport-pickup-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add School Airport Pickup'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSchoolAirportPickup()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

