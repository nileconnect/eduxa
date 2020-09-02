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

    <h2 class="title title-sm"><?php echo Yii::t('frontend', 'Test Results') ?></h2>

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
            <?php echo $form->field($model, 'test_name')->textInput(['placeholder'=>Yii::t('frontend','Test Name')])
                ->label(Yii::t('frontend','Test Name') ,['class'=>'label-control']); ?>
        </div>

        <div class="col-sm-6">
            <?php echo $form->field($model, 'score')->textInput(['placeholder'=>Yii::t('frontend','Score')])
                ->label(Yii::t('frontend','Score') ,['class'=>'label-control']); ?>
        </div>
<!--        <div class="col-sm-6">-->
<!----><?php ////echo $form->field($model, 'test_date')->textInput(['placeholder'=>Yii::t('frontend','Test Date')])
////                ->label(Yii::t('frontend','Test Date') ,['class'=>'label-control']); ?>
<!--        -->
<!---->
<!--        </div>-->



    </div>

    <div class="row">
        <div class="col-sm-12">

            <div class="form-group field-studenttestresults-score required">
                <label class="label-control" for="studenttestresults-score"><?= Yii::t('frontend','Test Date') ?></label>
                <?= $form->field($model, 'test_date')->widget(\yii\jui\DatePicker::className(), [
                    'dateFormat' => 'php:d-m-Y',
                    'clientOptions' => [

                        'changeMonth' => false,
                        'changeYear' => true,
                        'showButtonPanel' => true,
                        // 'dateFormat' => 'yyyy',
                        'yearRange' => '1950:'.date('Y')
                    ],
                ])->label(false);
                ?>
            </div>



        <?php
//        echo $form->field($model, 'test_date')->widget(\yii\jui\DatePicker::classname(), [
//
//            'clientOptions' => [
//
//                'changeMonth' => false,
//                'changeYear' => true,
//                'showButtonPanel' => true,
//               // 'dateFormat' => 'yyyy',
//                'yearRange' => '1990:2020'
//            ],
//        ])->label(false);

        ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'button button-wide button-primary' : 'button button-wide button-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
