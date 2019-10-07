<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;


/* @var $this yii\web\View */
/* @var $model backend\models\FaqCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-cat-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6 col-sm-12">

      <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-sm-12">

        <?=   $form->field($model, 'status')->widget(CheckboxX::classname(), [
        'name'=>'s_1',
        'options'=>['id'=>'s_1'],
        'pluginOptions'=>['threeState'=>false ,'size'=>'xl']

    ])->label(Yii::t('app','Publish and view on website'));

    ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
