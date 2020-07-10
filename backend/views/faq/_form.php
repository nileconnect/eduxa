<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">
    <?php
        $this->beginContent('@app/views/public/multi-lang.php');
        $this->endContent();
    ?>

    <?php $form = ActiveForm::begin();?>
    <?=$form->errorSummary($model);?>

    <?=$form->field($model, 'question')->textInput(['maxlength' => true])->widget(MyMultiLanguageActiveField::className());?>
    <?=$form->field($model, 'answer')->textarea(['rows' => 6])->widget(MyMultiLanguageActiveField::className());?>
        <?=$form->field($model, 'status')->widget(CheckboxX::classname(), [
    'name' => 's_1',
    'options' => ['id' => 's_1'],
    'pluginOptions' => ['threeState' => false, 'size' => 'xl'],

    ])->label(Yii::t('app', 'Publish and view on website'));

    ?>

    <div class="form-group">
        <?=Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
