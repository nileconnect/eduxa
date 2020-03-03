<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
/* @var $this yii\web\View */
/* @var $model backend\models\University */
/* @var $form yii\widgets\ActiveForm */

if($saved){
    $this->registerJs("$(function() {
          parent.jQuery.fancybox.getInstance().close();
           parent.location.reload();

     });
     
       ");
}

?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="col-md-4">
        <div class="well">
            <?php echo $form->field($model, 'logo')->widget(
                Upload::class,
                [
                    'url' => ['/file/storage/upload'],
                    'maxFileSize' => 5000000, // 5 MiB
                ]);
            ?>
        </div>
    </div>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
