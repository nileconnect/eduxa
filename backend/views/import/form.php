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
    .help-block{
        display:block  !important;
        width:100%;
    }
</style>
<div class="row">
    <div class="col-md-12 text-center" style="padding-top:50px">
    <?php
    if(Yii::$app->session->hasFlash('alert')){
        echo \kartik\growl\Growl::widget([
            'type' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'type'), //Growl::TYPE_SUCCESS,// ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'type'), //
            'icon' => 'glyphicon glyphicon-ok-sign',
            //'title' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'title'),
            'showSeparator' => true,
            'body' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
            'showSeparator' => false,
            'pluginOptions' => [
                'showProgressbar' => true,
                'placement' => [
                    'from' => 'bottom',
                    'align' => 'center',
                ]
            ]
        ]);
    }
    ?>
    <div><span>Download Sample File:</span> <a target="_blank" href="/samples/<?= $filename?>">Download</a></div>

    <div><span>- OR -</span></div>

    <div><span>Upload new file</span></div>
    <?php
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'file')->fileInput() ?>
        

        <div class="form-group" style="margin-top:10px">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end();
    ?>
    </div>
</div>

