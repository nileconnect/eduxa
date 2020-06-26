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
        <div class="col-md-8 col-sm-12" >
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
    </div>

    <div class="row" >
        <div class="col-md-4 col-sm-12">
            <?=$form->field($model, 'period')->radioList([
                ''=>'All',
                '1'=>'Month',
                '2'=>'2 Months',
                '3'=>'6 Months',
                '4'=>'Year',
            ])?>
        </div>
    </div>


    <div class="form-group">
        <?=Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary'])?>
        <a class="btn btn-default" href="/reports/requests"> <?=Yii::t('backend', 'Reset')?> </a>
    </div>

    <?php ActiveForm::end();?>

</div>
