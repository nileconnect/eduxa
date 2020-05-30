<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\helpers\multiLang\MyMultiLanguageActiveField;

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
    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>


    <div class="row">

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                            ->widget(MyMultiLanguageActiveField::className());  ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="well">
                        <?= $form->field($model, 'status')->dropDownList([\backend\models\University::LisStatusList()])?>

                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-4">
                <div class="well">

                    <?php echo $form->field($model, 'image')->widget(
                        Upload::class,
                        [
                            'url' => ['/file/storage/upload'],
                             'acceptFileTypes' => new \yii\web\JsExpression('/(\.|\/)(gif|jpeg|png)$/i'),
                            'uploadPath' => 'country/flags' , // optional, for storing files in storage subfolder
                            'maxFileSize' => 5000000, // 5 MiB
                        ]);
                    ?>
                </div>
            </div>

  </div>





    <?
    echo $form->field($model, 'intro')->textarea()->widget(MyMultiLanguageActiveField::className(), ['inputType'=>'textArea', 'inputOptions'=>[
        'rows'=>4,
        'class'=>'form-control',
    ]]) ?>

    <?php

    echo $form->field($model, 'details')->textarea()->widget(MyMultiLanguageActiveField::className(), ['inputType' => 'textArea', 'inputOptions' => [
        'rows' => 6,
        'class' => 'form-control',
    ]])

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
