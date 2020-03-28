<div class="form-group" id="add-school-accomodation">
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
    'formName' => 'SchoolAccomodation',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'title' => ['type' => TabularForm::INPUT_TEXT],

        'fees' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Accommodation reg. Fees',
            'options'=>['type' => 'number' ,'step'=>'number']
        ],

        'facility_id' => [
            'label' => 'Facilities',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolFacilities::find()->all() , 'id','title'),
                'options' => ['placeholder' => Yii::t('common', 'Choose ..')],
            ],
            'columnOptions' => ['width' => '200px']
        ],



        'room_cat_id' => [
            'label' => 'Room Category',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolRoomCategory::find()->all() , 'id','title'),
                'options' => ['placeholder' => Yii::t('common', 'Choose ..')],
            ],
            'columnOptions' => ['width' => '200px']
        ],

        'special_diet' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Special diet',
            'options'=>['type' => 'number' ,'step'=>'number']
        ],

        // 'room_size' => ['type' => TabularForm::INPUT_TEXT],
        'booking_cycle' => [
            'label' => 'Booking Cycle (Weekly / Monthly)',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => [\backend\models\Schools::BOOKING_WEEKLY =>'Weekly', \backend\models\Schools::BOOKING_MONTHLY=> 'Monthly'],
                'options' => ['placeholder' => Yii::t('common', 'Choose ..')],
            ],
            'columnOptions' => ['width' => '200px']
        ],


        'min_booking_duraion' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Minimum Booking duration',
            'options'=>['type' => 'number' ,'step'=>'number']
        ],


//        'min_age' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Minimum Age',
//            'options'=>['type' => 'number' ,'step'=>'number']
//        ],

        'max_age' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Maximum Age',
            'options'=>['type' => 'number' ,'step'=>'number']
        ],

        'distance_from_school' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Distance from school (Minutes)',
            'options'=>['type' => 'number' ,'step'=>'number']
        ],

        'cost_per_duration_unit' => ['type' => TabularForm::INPUT_TEXT , 'label'=>'Cost per Duration',
            'options'=>['type' => 'number' ,'step'=>'number']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowSchoolAccomodation(' . $key . '); return false;', 'id' => 'school-accomodation-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add School Accomodation'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSchoolAccomodation()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

