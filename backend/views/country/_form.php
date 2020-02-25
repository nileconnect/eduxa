<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Country */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'CountryAttachment', 
        'relID' => 'country-attachment', 
        'value' => \yii\helpers\Json::encode($model->countryAttachments),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>





    <div class="row">
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>
        </div>

        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>
        </div>
    </div>


    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>


    <?php echo $form->field($model, 'details')->textarea(['rows'=>20]);


//        ->widget(
//        \yii\imperavi\Widget::class,
//        [
//            'plugins' => ['fullscreen', 'fontcolor', 'video'],
//            'options' => [
//                'minHeight' => 400,
//                'maxHeight' => 400,
//                'buttonSource' => true,
//                'convertDivs' => false,
//                'removeEmptyTags' => true,
//                'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
//            ],
//        ]
//    );

    ?>


    <?php echo $form->field($model, 'image')->widget(
        Upload::class,
        [
            'url' => ['/file/storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        Upload::class,
        [
            'url' => ['/file/storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10,
        ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
