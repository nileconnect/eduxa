<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\multiLang\MyMultiLanguageActiveField;
/* @var $this yii\web\View */
/* @var $model backend\models\SchoolRoomCategory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="school-room-category-form">
    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
        ->widget(MyMultiLanguageActiveField::className());  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
