<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\SchoolCourse;
/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourse */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="school-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<?
    //= $form->field($model, 'school_id')->widget(\kartik\widgets\Select2::classname(), [
//        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Schools::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
//        'options' => ['placeholder' => Yii::t('backend', 'Choose Schools')],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]);
?>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'status')->dropDownList([\backend\models\University::LisStatusList()])?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'course_start_every')->dropDownList([MyWeekDays()]) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'required_level')->dropDownList([ SchoolCourse::ListLevels()]) ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'min_age')->textInput(['placeholder' => 'Min Age']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'registeration_fees')->textInput(['placeholder' => 'Registeration Fees']) ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'time_of_course')->dropDownList([ SchoolCourse::ListCourseTime()]) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'required_attendance_duraion')->textInput(['maxlength' => true, 'placeholder' => 'Required Attendance Duraion']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'no_of_weeks')->textInput(['placeholder' => 'No Of Weeks']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'cost_per_week')->textInput(['placeholder' => 'Cost Per Week']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'discount')->textInput(['placeholder' => 'Discount']) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'lessons_per_week')->textInput(['placeholder' => 'Lessons Per Week']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'hours_per_week')->textInput(['placeholder' => 'Hours Per Week']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'min_no_of_students_per_class')->textInput(['placeholder' => 'Min No Of Students Per Class']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'avg_no_of_students_per_class')->textInput(['placeholder' => 'Avg No Of Students Per Class']) ?>
        </div>
    </div>

    <?= $form->field($model, 'information')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requirments')->textarea(['rows' => 6]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
