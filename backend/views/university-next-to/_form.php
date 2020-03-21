<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityNextTo */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="university-next-to-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>



    <div class="row">
<!--        <div class="col-md-6 col-sm-12">-->
<!--            --><?//= $form->field($model, 'university_id')->widget(\kartik\widgets\Select2::classname(), [
//                'data' => \yii\helpers\ArrayHelper::map(\backend\models\University::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
//                'options' => ['placeholder' => Yii::t('backend', 'Choose University')],
//                'pluginOptions' => [
//                    'allowClear' => true
//                ],
//            ]); ?>
<!---->
<!---->
<!--        </div>-->

        <div class="col-md-10 col-sm-12">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                ->widget(MyMultiLanguageActiveField::className());  ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
