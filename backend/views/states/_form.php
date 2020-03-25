<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\State */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                ->widget(MyMultiLanguageActiveField::className());  ?>
        </div>

        <div class="col-md-4 col-sm-12">
        </div>
    </div>



    <? //= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'meta_description')//->widget(MultiLanguageActiveField::className(), ['inputType' => 'textArea']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
