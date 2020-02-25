<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UniversityProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-university-programs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'university_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\University::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose University')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'major_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramMajors::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose University program majors')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'degree_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramDegree::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose University program degree')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'field_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\UniversityProgramField::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose University program field')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'country_id')->textInput(['placeholder' => 'Country']) */ ?>

    <?php /* echo $form->field($model, 'city_id')->textInput(['placeholder' => 'State']) */ ?>

    <?php /* echo $form->field($model, 'study_start_date')->textInput(['maxlength' => true, 'placeholder' => 'Study Start Date']) */ ?>

    <?php /* echo $form->field($model, 'study_duration')->textInput(['maxlength' => true, 'placeholder' => 'Study Duration']) */ ?>

    <?php /* echo $form->field($model, 'study_method')->textInput(['maxlength' => true, 'placeholder' => 'Study Method']) */ ?>

    <?php /* echo $form->field($model, 'attendance_type')->textInput(['maxlength' => true, 'placeholder' => 'Attendance Type']) */ ?>

    <?php /* echo $form->field($model, 'annual_cost')->textInput(['placeholder' => 'Annual Cost']) */ ?>

    <?php /* echo $form->field($model, 'conditional_admissions')->textInput(['maxlength' => true, 'placeholder' => 'Conditional Admissions']) */ ?>

    <?php /* echo $form->field($model, 'toefl')->textInput(['maxlength' => true, 'placeholder' => 'Toefl']) */ ?>

    <?php /* echo $form->field($model, 'ielts')->textInput(['maxlength' => true, 'placeholder' => 'Ielts']) */ ?>

    <?php /* echo $form->field($model, 'bank_statment')->textInput(['maxlength' => true, 'placeholder' => 'Bank Statment']) */ ?>

    <?php /* echo $form->field($model, 'high_school_transcript')->textInput(['maxlength' => true, 'placeholder' => 'High School Transcript']) */ ?>

    <?php /* echo $form->field($model, 'bachelor_degree')->textInput(['maxlength' => true, 'placeholder' => 'Bachelor Degree']) */ ?>

    <?php /* echo $form->field($model, 'certificate')->textInput(['maxlength' => true, 'placeholder' => 'Certificate']) */ ?>

    <?php /* echo $form->field($model, 'note1')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'note2')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'total_rating')->textInput(['placeholder' => 'Total Rating']) */ ?>

    <?php /* echo $form->field($model, 'program_type')->textInput(['placeholder' => 'Program Type']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
