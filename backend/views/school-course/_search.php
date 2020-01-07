<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SchoolCourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-school-course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'school_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Schools::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose Schools')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'information')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requirments')->textarea(['rows' => 6]) ?>

    <?php /* echo $form->field($model, 'course_start_every')->textInput(['maxlength' => true, 'placeholder' => 'Course Start Every']) */ ?>

    <?php /* echo $form->field($model, 'lessons_per_week')->textInput(['placeholder' => 'Lessons Per Week']) */ ?>

    <?php /* echo $form->field($model, 'hours_per_week')->textInput(['placeholder' => 'Hours Per Week']) */ ?>

    <?php /* echo $form->field($model, 'min_no_of_students_per_class')->textInput(['placeholder' => 'Min No Of Students Per Class']) */ ?>

    <?php /* echo $form->field($model, 'avg_no_of_students_per_class')->textInput(['placeholder' => 'Avg No Of Students Per Class']) */ ?>

    <?php /* echo $form->field($model, 'min_age')->textInput(['placeholder' => 'Min Age']) */ ?>

    <?php /* echo $form->field($model, 'required_level')->textInput(['placeholder' => 'Reguired Level']) */ ?>

    <?php /* echo $form->field($model, 'time_of_course')->textInput(['placeholder' => 'Time Of Course']) */ ?>

    <?php /* echo $form->field($model, 'registeration_fees')->textInput(['placeholder' => 'Registeration Fees']) */ ?>

    <?php /* echo $form->field($model, 'cost_per_week')->textInput(['placeholder' => 'Cost Per Week']) */ ?>

    <?php /* echo $form->field($model, 'no_of_weeks')->textInput(['placeholder' => 'No Of Weeks']) */ ?>

    <?php /* echo $form->field($model, 'discount')->textInput(['placeholder' => 'Discount']) */ ?>

    <?php /* echo $form->field($model, 'required_attendance_duraion')->textInput(['maxlength' => true, 'placeholder' => 'Required Attendance Duraion']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
