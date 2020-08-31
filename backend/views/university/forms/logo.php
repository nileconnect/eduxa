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

<style>
.form-group{
    text-align:center !important;  
}
.form-group .control-label{
        font-size: 18px !important;
    margin-bottom: 15px !important;
    font-weight: bold !important;
    }
    .upload-kit ul{
        float:none !important;
    }
    .upload-kit ul li{
        float:none !important;
    }
    .upload-kit-input{
        float: none !important;
    
    }
</style>
<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="col-md-4">
        <div class="well">
        <div class="alert alert-info">for better view please upload images not smaller than 600px * 600px </div>

<!--            --><?php //echo $form->field($model, 'logo')->widget(
//                Upload::class,
//                [
//                    'url' => ['/file/storage/upload'],
//                    'maxFileSize' => 5000000, // 5 MiB
//                ]);
//            ?>

            <?php echo $form->field($model, 'logo')->widget(
                Upload::class,
                [
                    'url' => ['/university/avatar-upload'],
                    'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpeg|png)$/i'),
                    'uploadPath' => '/university/'.$model->id.'/logo' , // optional, for storing files in storage subfolder
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
