<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $arr = \yii\helpers\ArrayHelper::map(\backend\models\FaqCat::find()->all(), 'id', 'title');
    echo $form->field($model, 'cat_id')->dropDownList($arr, [ 'prompt' => Yii::t('app','Select')]);

  ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>


        <?=   $form->field($model, 'status')->widget(CheckboxX::classname(), [
        'name'=>'s_1',
        'options'=>['id'=>'s_1'],
        'pluginOptions'=>['threeState'=>false ,'size'=>'xl']

    ])->label(Yii::t('app','Publish and view on website'));

    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
