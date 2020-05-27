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

    <h2><?php echo Yii::t('frontend', 'Certificate details') ?></h2>

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
            <?php echo $form->field($model, 'certificate_name')->textInput(['placeholder'=>Yii::t('common','Certificate Name')])
                ->label(Yii::t('common','Certificate Name') ,['class'=>'label-control']); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model, 'year')->textInput(['placeholder'=>Yii::t('common','Year')])
                ->label(Yii::t('common','Year') ,['class'=>'label-control']); ?>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-6">
                <?php echo $form->field($model, 'grade')->textInput(['placeholder'=>Yii::t('common','Grade')])
                    ->label(Yii::t('common','Grade') ,['class'=>'label-control']); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model, 'university_or_school')->textInput(['placeholder'=>Yii::t('common','University or School')])
                ->label(Yii::t('common','University or School') ,['class'=>'label-control']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
                    'options' => ['placeholder' => Yii::t('common', 'Choose Country') ,'id'=>'CountryId'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(Yii::t('common','Country')); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
