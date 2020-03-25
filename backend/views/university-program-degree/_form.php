<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramDegree */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="university-program-degree-form">

    <?php
    $this->beginContent('@app/views/public/multi-lang.php');
    $this->endContent();
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <div class="col-md-8 col-sm-12">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                ->widget(MyMultiLanguageActiveField::className());  ?>
        </div>

        <div class="col-md-4 col-sm-12">
        </div>
    </div>
    <?php
    /*
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'UniversityPrograms')),
            'content' => $this->render('_formUniversityPrograms', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->universityPrograms),
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
    */
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
