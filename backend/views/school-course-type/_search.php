<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SchoolCourseTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-school-course-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['placeholder' => 'Id']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true, 'placeholder' => 'Created At']) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true, 'placeholder' => 'Updated At']) ?>

    <?= $form->field($model, 'created_by')->textInput(['placeholder' => 'Created By']) ?>

    <?php /* echo $form->field($model, 'updated_by')->textInput(['placeholder' => 'Updated By']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
