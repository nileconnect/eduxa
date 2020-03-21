<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Requests */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="requests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'model_name')->textInput(['placeholder' => 'Model Name']) ?>

    <?= $form->field($model, 'model_id')->textInput(['placeholder' => 'Model']) ?>

    <?= $form->field($model, 'model_parent_id')->textInput(['placeholder' => 'Model Parent']) ?>

    <?= $form->field($model, 'request_by_role')->textInput(['placeholder' => 'Request By Role']) ?>

    <?= $form->field($model, 'student_id')->textInput(['placeholder' => 'Student']) ?>

    <?= $form->field($model, 'requester_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'request_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'admin_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_first_name')->textInput(['maxlength' => true, 'placeholder' => 'Student First Name']) ?>

    <?= $form->field($model, 'student_last_name')->textInput(['maxlength' => true, 'placeholder' => 'Student Last Name']) ?>

    <?= $form->field($model, 'student_gender')->textInput(['placeholder' => 'Student Gender']) ?>

    <?= $form->field($model, 'student_email')->textInput(['maxlength' => true, 'placeholder' => 'Student Email']) ?>

    <?= $form->field($model, 'student_mobile')->textInput(['maxlength' => true, 'placeholder' => 'Student Mobile']) ?>

    <?= $form->field($model, 'student_country_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose Country')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'student_city_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\State::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose State')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'student_nationality_id')->textInput(['placeholder' => 'Student Nationality']) ?>

    <?= $form->field($model, 'accomodation_option')->textInput(['maxlength' => true, 'placeholder' => 'Accomodation Option']) ?>

    <?= $form->field($model, 'accomodation_option_cost')->textInput(['placeholder' => 'Accomodation Option Cost']) ?>

    <?= $form->field($model, 'airport_pickup')->textInput(['maxlength' => true, 'placeholder' => 'Airport Pickup']) ?>

    <?= $form->field($model, 'airport_pickup_cost')->textInput(['maxlength' => true, 'placeholder' => 'Airport Pickup Cost']) ?>

    <?= $form->field($model, 'course_start_date')->textInput(['maxlength' => true, 'placeholder' => 'Course Start Date']) ?>

    <?= $form->field($model, 'number_of_weeks')->textInput(['placeholder' => 'Number Of Weeks']) ?>

    <?= $form->field($model, 'status')->textInput(['placeholder' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
