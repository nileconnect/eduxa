<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="schools-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'course_type')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\SchoolsCourseTypes::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose Schools course types')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'featured')->textInput(['placeholder' => 'Featured']) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Location']) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true, 'placeholder' => 'Lat']) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true, 'placeholder' => 'Lng']) ?>

    <?= $form->field($model, 'image_base_url')->textInput(['maxlength' => true, 'placeholder' => 'Image Base Url']) ?>

    <?= $form->field($model, 'image_path')->textInput(['maxlength' => true, 'placeholder' => 'Image Path']) ?>

    <?= $form->field($model, 'country_id')->textInput(['placeholder' => 'Country']) ?>

    <?= $form->field($model, 'city_id')->textInput(['placeholder' => 'City']) ?>

    <?= $form->field($model, 'min_age')->textInput(['placeholder' => 'Min Age']) ?>

    <?= $form->field($model, 'start_every')->textInput(['maxlength' => true, 'placeholder' => 'Start Every']) ?>

    <?= $form->field($model, 'study_time')->textInput(['maxlength' => true, 'placeholder' => 'Study Time']) ?>

    <?= $form->field($model, 'max_students_per_class')->textInput(['placeholder' => 'Max Students Per Class']) ?>

    <?= $form->field($model, 'avg_students_per_class')->textInput(['placeholder' => 'Avg Students Per Class']) ?>

    <?= $form->field($model, 'lessons_per_week')->textInput(['placeholder' => 'Lessons Per Week']) ?>

    <?= $form->field($model, 'hours_per_week')->textInput(['placeholder' => 'Hours Per Week']) ?>

    <?= $form->field($model, 'accomodation_fees')->textInput(['placeholder' => 'Accomodation Fees']) ?>

    <?= $form->field($model, 'registeration_fees')->textInput(['placeholder' => 'Registeration Fees']) ?>

    <?= $form->field($model, 'study_books_fees')->textInput(['placeholder' => 'Study Books Fees']) ?>

    <?= $form->field($model, 'fees_per_week')->textInput(['placeholder' => 'Fees Per Week']) ?>

    <?= $form->field($model, 'discount')->textInput(['placeholder' => 'Discount']) ?>

    <?= $form->field($model, 'total_rating')->textInput(['placeholder' => 'Total Rating']) ?>

    <?= $form->field($model, 'status')->textInput(['placeholder' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
