<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SchoolsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-schools-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

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

    <?php /* echo $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Location']) */ ?>

    <?php /* echo $form->field($model, 'lat')->textInput(['maxlength' => true, 'placeholder' => 'Lat']) */ ?>

    <?php /* echo $form->field($model, 'lng')->textInput(['maxlength' => true, 'placeholder' => 'Lng']) */ ?>

    <?php /* echo $form->field($model, 'image_base_url')->textInput(['maxlength' => true, 'placeholder' => 'Image Base Url']) */ ?>

    <?php /* echo $form->field($model, 'image_path')->textInput(['maxlength' => true, 'placeholder' => 'Image Path']) */ ?>

    <?php /* echo $form->field($model, 'country_id')->textInput(['placeholder' => 'Country']) */ ?>

    <?php /* echo $form->field($model, 'city_id')->textInput(['placeholder' => 'City']) */ ?>

    <?php /* echo $form->field($model, 'min_age')->textInput(['placeholder' => 'Min Age']) */ ?>

    <?php /* echo $form->field($model, 'start_every')->textInput(['maxlength' => true, 'placeholder' => 'Start Every']) */ ?>

    <?php /* echo $form->field($model, 'study_time')->textInput(['maxlength' => true, 'placeholder' => 'Study Time']) */ ?>

    <?php /* echo $form->field($model, 'max_students_per_class')->textInput(['placeholder' => 'Max Students Per Class']) */ ?>

    <?php /* echo $form->field($model, 'avg_students_per_class')->textInput(['placeholder' => 'Avg Students Per Class']) */ ?>

    <?php /* echo $form->field($model, 'lessons_per_week')->textInput(['placeholder' => 'Lessons Per Week']) */ ?>

    <?php /* echo $form->field($model, 'hours_per_week')->textInput(['placeholder' => 'Hours Per Week']) */ ?>

    <?php /* echo $form->field($model, 'accomodation_fees')->textInput(['placeholder' => 'Accomodation Fees']) */ ?>

    <?php /* echo $form->field($model, 'registeration_fees')->textInput(['placeholder' => 'Registeration Fees']) */ ?>

    <?php /* echo $form->field($model, 'study_books_fees')->textInput(['placeholder' => 'Study Books Fees']) */ ?>

    <?php /* echo $form->field($model, 'fees_per_week')->textInput(['placeholder' => 'Fees Per Week']) */ ?>

    <?php /* echo $form->field($model, 'discount')->textInput(['placeholder' => 'Discount']) */ ?>

    <?php /* echo $form->field($model, 'total_rating')->textInput(['placeholder' => 'Total Rating']) */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['placeholder' => 'Status']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
