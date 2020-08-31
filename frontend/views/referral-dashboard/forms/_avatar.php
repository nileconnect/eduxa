<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
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
        width: 100% !important;
    }
</style>
<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>
     <div class="col-md-4">
        <div class="well">
        <div class="alert alert-info"><?= Yii::t('common','for better view please upload images not smaller than 600px * 600px ')?></div>

            <?php echo $form->field($profile, 'picture')->widget(
                Upload::class,
                [
                    'url' => ['/referral-dashboard/avatar-upload'],
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpeg|png)$/i'),
                    'uploadPath' => 'profile/'.Yii::$app->user->id , // optional, for storing files in storage subfolder
                    'maxFileSize' => 5000000, // 5 MiB
                ]
            )?>

        </div>
    </div>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton( Yii::t('backend', 'Update'), ['class' => 'button button-wide button-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
