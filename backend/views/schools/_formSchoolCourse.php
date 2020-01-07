<div class="form-group" id="add-school-course">
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
    'formName' => 'SchoolCourse',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'title' => ['type' => TabularForm::INPUT_TEXT],
        'information' => ['type' => TabularForm::INPUT_TEXTAREA],
        'requirments' => ['type' => TabularForm::INPUT_TEXTAREA],
        'course_start_every' => ['type' => TabularForm::INPUT_TEXT],
        'lessons_per_week' => ['type' => TabularForm::INPUT_TEXT],
        'hours_per_week' => ['type' => TabularForm::INPUT_TEXT],
        'min_no_of_students_per_class' => ['type' => TabularForm::INPUT_TEXT],
        'avg_no_of_students_per_class' => ['type' => TabularForm::INPUT_TEXT],
        'min_age' => ['type' => TabularForm::INPUT_TEXT],
        'required_level' => ['type' => TabularForm::INPUT_TEXT],
        'time_of_course' => ['type' => TabularForm::INPUT_TEXT],
        'registeration_fees' => ['type' => TabularForm::INPUT_TEXT],
        'cost_per_week' => ['type' => TabularForm::INPUT_TEXT],
        'no_of_weeks' => ['type' => TabularForm::INPUT_TEXT],
        'discount' => ['type' => TabularForm::INPUT_TEXT],
        'required_attendance_duraion' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('backend', 'Delete'), 'onClick' => 'delRowSchoolCourse(' . $key . '); return false;', 'id' => 'school-course-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('backend', 'Add School Course'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSchoolCourse()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

