<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameFormat */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="university-programe-format-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                ->widget(MyMultiLanguageActiveField::className());  ?>
        </div>

        <div class="col-md-4 col-sm-12">
        </div>
    </div>
    <? //= $form->field($model, 'status')->textInput(['placeholder' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
