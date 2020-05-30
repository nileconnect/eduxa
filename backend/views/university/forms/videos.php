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

\mootensai\components\JsBlock::widget(['viewFile' => '../_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'UniversityVideos',
        'relID' => 'university-videos',
        'value' => \yii\helpers\Json::encode($model->universityVideos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);


?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="col-md-4">
        <div class="well">

            <?php
            $forms = [

                [
                    'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'University Videos')),
                    'content' => $this->render('_formUniversityVideos', [
                        'row' => \yii\helpers\ArrayHelper::toArray($model->universityVideos),
                    ]),
                ],

            ];

            echo kartik\tabs\TabsX::widget([
                'items' => $forms,
                'position' => kartik\tabs\TabsX::POS_ABOVE,
                'encodeLabels' => false,
                'pluginOptions' => [
                    'bordered' => true,
                    'sideways' => true,
                    'enableCache' => false,
                ],
            ]);
            ?>

        </div>
    </div>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
