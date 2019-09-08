<div class="form-group" id="add-university-programs">
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
    'formName' => 'UniversityPrograms',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'university_id' => [
            'label' => 'University',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\University::find()->orderBy('title')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'title' => ['type' => TabularForm::INPUT_TEXT],
        'major_id' => [
            'label' => 'University program majors',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('title')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program majors')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'field_id' => [
            'label' => 'University program field',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('title')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('backend', 'Choose University program field')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'country_id' => ['type' => TabularForm::INPUT_TEXT],
        'city_id' => ['type' => TabularForm::INPUT_TEXT],
        'study_start_date' => ['type' => TabularForm::INPUT_TEXT],
        'study_duration' => ['type' => TabularForm::INPUT_TEXT],
        'study_method' => ['type' => TabularForm::INPUT_TEXT],
        'attendance_type' => ['type' => TabularForm::INPUT_TEXT],
        'annual_cost' => ['type' => TabularForm::INPUT_TEXT],
        'conditional_admissions' => ['type' => TabularForm::INPUT_TEXT],
        'toefl' => ['type' => TabularForm::INPUT_TEXT],
        'ielts' => ['type' => TabularForm::INPUT_TEXT],
        'bank_statment' => ['type' => TabularForm::INPUT_TEXT],
        'high_school_transcript' => ['type' => TabularForm::INPUT_TEXT],
        'bachelor_degree' => ['type' => TabularForm::INPUT_TEXT],
        'certificate' => ['type' => TabularForm::INPUT_TEXT],
        'note1' => ['type' => TabularForm::INPUT_TEXTAREA],
        'note2' => ['type' => TabularForm::INPUT_TEXTAREA],
        'total_rating' => ['type' => TabularForm::INPUT_TEXT],
        'program_type' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowUniversityPrograms(' . $key . '); return false;', 'id' => 'university-programs-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add University Programs'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUniversityPrograms()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

