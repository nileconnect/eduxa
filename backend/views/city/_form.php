<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use webvimark\behaviors\multilanguage\input_widget\MultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'meta_description')//->widget(MultiLanguageActiveField::className(), ['inputType' => 'textArea']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
