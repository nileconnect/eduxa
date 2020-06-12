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
        width: 100% !important;
    }
</style>

<?php
 $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end();
?>

