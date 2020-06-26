<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use backend\models\Requests;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<style>
.radio input[type=radio], label.radio-inline input[type=radio] {
    opacity: 1;
    height: 10px;
    width: 10px;
}
</style>

<div class="form-users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['users'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2 col-sm-12">
            <?=$form->field($model, 'user_role')->dropDownList([
                'user'=> Yii::t('common','Student'),
                'referralCompany'=> Yii::t('common',"Referral Company"),
                'referralPerson'=> Yii::t('common',"Referral Person"),
            ], ['prompt' => 'Select'])->label('User Type')?>
        </div>
        <div class="col-md-2 col-sm-12">
            <?=$form->field($model, 'gender')->dropDownList([
                '1'=>'Male',
                '2'=>'Female',
            ], ['prompt' => 'Select'])?>
        </div>
        <div class="col-md-2 col-sm-12">
            <?=$form->field($model, 'nationality')->textInput(['placeholder' => 'Nationality'])?>
        </div>

        <div class="col-md-6 col-sm-12" >
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
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end() ?>

</div>
