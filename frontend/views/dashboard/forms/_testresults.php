<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
if($saved){
    $this->registerJs("$(function() {
          parent.jQuery.fancybox.getInstance().close();
           parent.location.reload();

     });
     
       ");
}

?>
<div class="modal-body">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <h2><?php echo Yii::t('frontend', 'Test Results') ?></h2>

    <?php
    //    echo $form->field($model, 'picture')->widget(
    //        Upload::class,
    //        [
    //            'url' => ['avatar-upload']
    //        ]
    //    );
    ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $form->field($model, 'test_name')->textInput(['placeholder'=>Yii::t('common','Test Name')])
                ->label(Yii::t('common','Test Name') ,['class'=>'label-control']); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model, 'test_date')->textInput(['placeholder'=>Yii::t('common','Test Date')])
                ->label(Yii::t('common','Test Date') ,['class'=>'label-control']); ?>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-6">
                <?php echo $form->field($model, 'score')->textInput(['placeholder'=>Yii::t('common','Score')])
                    ->label(Yii::t('common','Score') ,['class'=>'label-control']); ?>
        </div>

    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
