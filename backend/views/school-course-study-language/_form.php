<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\multiLang\MyMultiLanguageActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourseStudyLanguage */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="school-course-study-language-form">

    <?php
        $this->beginContent('@app/views/public/multi-lang.php');
        $this->endContent();
    ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])
                ->widget(MyMultiLanguageActiveField::className());  ?>
        </div>

        <div class="col-md-4 col-sm-12">
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
