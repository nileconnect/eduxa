<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SchoolsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-schools-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

        <?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'Slug']) ?>

        <?= $form->field($model, 'school_identity_number')->textInput(['placeholder' => 'School Identity Number']) ?>

        <?= $form->field($model, 'city_id')->textInput(['placeholder' => 'City']) ?>
        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
</div>
   

    <?php /* echo $form->field($model, 'district_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\District::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose District')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'stage')->textInput(['placeholder' => 'Stage']) */ ?>

    <?php /* echo $form->field($model, 'gender')->textInput(['placeholder' => 'Gender']) */ ?>

    <?php /* echo $form->field($model, 'category')->textInput(['placeholder' => 'Category']) */ ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'admin_name')->textInput(['maxlength' => true, 'placeholder' => 'Admin Name']) */ ?>

    <?php /* echo $form->field($model, 'admin_phone')->textInput(['maxlength' => true, 'placeholder' => 'Admin Phone']) */ ?>

    <?php /* echo $form->field($model, 'admin_email')->textInput(['maxlength' => true, 'placeholder' => 'Admin Email']) */ ?>

    <?php /* echo $form->field($model, 'supervisor_phone')->textInput(['maxlength' => true, 'placeholder' => 'Supervisor Phone']) */ ?>

    <?php /* echo $form->field($model, 'owner_name')->textInput(['maxlength' => true, 'placeholder' => 'Owner Name']) */ ?>

    <?php /* echo $form->field($model, 'owner_phone')->textInput(['maxlength' => true, 'placeholder' => 'Owner Phone']) */ ?>

    <?php /* echo $form->field($model, 'owner_identity')->textInput(['maxlength' => true, 'placeholder' => 'Owner Identity']) */ ?>

    <?php /* echo $form->field($model, 'owner_gender')->textInput(['placeholder' => 'Owner Gender']) */ ?>

    <?php /* echo $form->field($model, 'owner_email')->textInput(['maxlength' => true, 'placeholder' => 'Owner Email']) */ ?>

    <?php /* echo $form->field($model, 'nour_rep_phone')->textInput(['maxlength' => true, 'placeholder' => 'Nour Rep Phone']) */ ?>

    <?php /* echo $form->field($model, 'owner_id')->textInput(['placeholder' => 'Owner']) */ ?>

    <?php /* echo $form->field($model, 'lock')->textInput(['placeholder' => 'Lock']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
