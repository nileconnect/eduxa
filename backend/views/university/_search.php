<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UniversitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-university-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>


    <?php /* echo $form->field($model, 'detailed_address')->textInput(['maxlength' => true, 'placeholder' => 'Detailed Address']) */ ?>

    <?php /* echo $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Location']) */ ?>

    <?php /* echo $form->field($model, 'lat')->textInput(['maxlength' => true, 'placeholder' => 'Lat']) */ ?>

    <?php /* echo $form->field($model, 'lng')->textInput(['maxlength' => true, 'placeholder' => 'Lng']) */ ?>

    <?php /* echo $form->field($model, 'total_rating')->textInput(['placeholder' => 'Total Rating']) */ ?>

    <?php /* echo $form->field($model, 'no_of_ratings')->textInput(['placeholder' => 'No Of Ratings']) */ ?>

    <?php /* echo $form->field($model, 'recommended')->checkbox() */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
