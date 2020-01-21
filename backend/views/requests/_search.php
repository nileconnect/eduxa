<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RequestsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-requests-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'model_name')->textInput(['placeholder' => 'Model Name']) ?>

    <?= $form->field($model, 'model_id')->textInput(['placeholder' => 'Model']) ?>

    <?= $form->field($model, 'model_parent_id')->textInput(['placeholder' => 'Model Parent']) ?>

    <?= $form->field($model, 'request_by_role')->textInput(['placeholder' => 'Request By Role']) ?>

    <?php /* echo $form->field($model, 'student_id')->textInput(['placeholder' => 'Student']) */ ?>

    <?php /* echo $form->field($model, 'requester_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'request_notes')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'admin_notes')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'student_first_name')->textInput(['maxlength' => true, 'placeholder' => 'Student First Name']) */ ?>

    <?php /* echo $form->field($model, 'student_last_name')->textInput(['maxlength' => true, 'placeholder' => 'Student Last Name']) */ ?>

    <?php /* echo $form->field($model, 'student_gender')->textInput(['placeholder' => 'Student Gender']) */ ?>

    <?php /* echo $form->field($model, 'student_email')->textInput(['maxlength' => true, 'placeholder' => 'Student Email']) */ ?>

    <?php /* echo $form->field($model, 'student_mobile')->textInput(['maxlength' => true, 'placeholder' => 'Student Mobile']) */ ?>

    <?php /* echo $form->field($model, 'student_country_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose Country')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'student_city_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\City::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose City')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'student_nationality_id')->textInput(['placeholder' => 'Student Nationality']) */ ?>

    <?php /* echo $form->field($model, 'accomodation_option')->textInput(['maxlength' => true, 'placeholder' => 'Accomodation Option']) */ ?>

    <?php /* echo $form->field($model, 'accomodation_option_cost')->textInput(['placeholder' => 'Accomodation Option Cost']) */ ?>

    <?php /* echo $form->field($model, 'airport_pickup')->textInput(['maxlength' => true, 'placeholder' => 'Airport Pickup']) */ ?>

    <?php /* echo $form->field($model, 'airport_pickup_cost')->textInput(['maxlength' => true, 'placeholder' => 'Airport Pickup Cost']) */ ?>

    <?php /* echo $form->field($model, 'course_start_date')->textInput(['maxlength' => true, 'placeholder' => 'Course Start Date']) */ ?>

    <?php /* echo $form->field($model, 'number_of_weeks')->textInput(['placeholder' => 'Number Of Weeks']) */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['placeholder' => 'Status']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
