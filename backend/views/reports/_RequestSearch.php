<?php

use backend\models\Requests;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RequestsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-requests-search" style="padding-left: 50px">

    <?php $form = ActiveForm::begin([
    'action' => ['/reports/requests'],
    'method' => 'get',
]);?>

    <div class="row">
        <div class="col-md-4 col-sm-12">
            <?=$form->field($model, 'request_by_role')->dropDownList(Requests::ListRequestBy(), ['prompt' => 'Select'])->label('User Type')?>
        </div>
        <div class="col-md-4 col-sm-12">
            <?=$form->field($model, 'status')->dropDownList(Requests::ListStatus(), ['prompt' => 'Select'])?>
        </div>
        <div class="col-md-4 col-sm-12">
            <?=$form->field($model, 'student_nationality_id')->textInput(['placeholder' => 'Nationality'])?>
        </div>

        <div class="col-md-4 col-sm-12">
            <?=$form->field($model, 'model_name')->dropDownList(Requests::ListModelNames(), ['prompt' => 'Select'])?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-sm-10" >
            <?php
                echo DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'creation_from_date',
                    'attribute2' => 'creation_to_date',
                    'options' => ['placeholder' => 'Date From'],
                    'options2' => ['placeholder' => 'Date To'],
                    'type' => DatePicker::TYPE_RANGE,
                    'form' => $form,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ],
                ]);
            ?>
        </div>


    <?// = $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?// = $form->field($model, 'model_name')->textInput(['placeholder' => 'Model Name']) ?>

    <?// = $form->field($model, 'model_id')->textInput(['placeholder' => 'Model']) ?>

    <?// = $form->field($model, 'model_parent_id')->textInput(['placeholder' => 'Model Parent']) ?>


    <?php /* echo $form->field($model, 'student_id')->textInput(['placeholder' => 'Student']) */?>

    <?php /* echo $form->field($model, 'requester_id')->widget(\kartik\widgets\Select2::classname(), [
'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
'options' => ['placeholder' => Yii::t('backend', 'Choose User')],
'pluginOptions' => [
'allowClear' => true
],
]); */?>

    <?php /* echo $form->field($model, 'request_notes')->textarea(['rows' => 6]) */?>

    <?php /* echo $form->field($model, 'admin_notes')->textarea(['rows' => 6]) */?>

    <?php /* echo $form->field($model, 'student_first_name')->textInput(['maxlength' => true, 'placeholder' => 'Student First Name']) */?>

    <?php /* echo $form->field($model, 'student_last_name')->textInput(['maxlength' => true, 'placeholder' => 'Student Last Name']) */?>

    <?php /* echo $form->field($model, 'student_gender')->textInput(['placeholder' => 'Student Gender']) */?>

    <?php /* echo $form->field($model, 'student_email')->textInput(['maxlength' => true, 'placeholder' => 'Student Email']) */?>

    <?php /* echo $form->field($model, 'student_mobile')->textInput(['maxlength' => true, 'placeholder' => 'Student Mobile']) */?>

    <?php /* echo $form->field($model, 'student_country_id')->widget(\kartik\widgets\Select2::classname(), [
'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
'options' => ['placeholder' => Yii::t('backend', 'Choose Country')],
'pluginOptions' => [
'allowClear' => true
],
]); */?>

    <?php /* echo $form->field($model, 'student_city_id')->widget(\kartik\widgets\Select2::classname(), [
'data' => \yii\helpers\ArrayHelper::map(\backend\models\State::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
'options' => ['placeholder' => Yii::t('backend', 'Choose State')],
'pluginOptions' => [
'allowClear' => true
],
]); */?>

    <?php /* echo $form->field($model, 'student_nationality_id')->textInput(['placeholder' => 'Student Nationality']) */?>

    <?php /* echo $form->field($model, 'accomodation_option')->textInput(['maxlength' => true, 'placeholder' => 'Accomodation Option']) */?>

    <?php /* echo $form->field($model, 'accomodation_option_cost')->textInput(['placeholder' => 'Accomodation Option Cost']) */?>

    <?php /* echo $form->field($model, 'airport_pickup')->textInput(['maxlength' => true, 'placeholder' => 'Airport Pickup']) */?>

    <?php /* echo $form->field($model, 'airport_pickup_cost')->textInput(['maxlength' => true, 'placeholder' => 'Airport Pickup Cost']) */?>

    <?php /* echo $form->field($model, 'course_start_date')->textInput(['maxlength' => true, 'placeholder' => 'Course Start Date']) */?>

    <?php /* echo $form->field($model, 'number_of_weeks')->textInput(['placeholder' => 'Number Of Weeks']) */?>

    <?php /* echo $form->field($model, 'status')->textInput(['placeholder' => 'Status']) */?>

    <div class="form-group">
        <?=Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary'])?>
        <a class="btn btn-default" href="/reports/requests"> <?=Yii::t('backend', 'Reset')?> </a>
    </div>

    <?php ActiveForm::end();?>

</div>
