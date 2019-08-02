<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="schools-form  grid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>
    
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'Slug']) ?>
    
        <?= $form->field($model, 'school_identity_number')->textInput(['placeholder' => 'School Identity Number']) ?>
   
        <?= $form->field($model, 'city_id')->textInput(['placeholder' => 'City']) ?>
   
         <?= $form->field($model, 'district_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\District::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('backend', 'Choose District')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <div class="clearfix"></div>
   
        <?= $form->field($model, 'stage')->textInput(['placeholder' => 'Stage']) ?>
    
        <?= $form->field($model, 'gender')->textInput(['placeholder' => 'Gender']) ?>
   
        <?= $form->field($model, 'category')->textInput(['placeholder' => 'Category']) ?>
    
        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
   
        <?= $form->field($model, 'admin_name')->textInput(['maxlength' => true, 'placeholder' => 'Admin Name']) ?>
    
        <?= $form->field($model, 'admin_phone')->textInput(['maxlength' => true, 'placeholder' => 'Admin Phone']) ?>
    
        <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true, 'placeholder' => 'Admin Email']) ?>
   
        <?= $form->field($model, 'supervisor_phone')->textInput(['maxlength' => true, 'placeholder' => 'Supervisor Phone']) ?>
    
        <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true, 'placeholder' => 'Owner Name']) ?>
   
        <?= $form->field($model, 'owner_phone')->textInput(['maxlength' => true, 'placeholder' => 'Owner Phone']) ?>
   
        <?= $form->field($model, 'owner_identity')->textInput(['maxlength' => true, 'placeholder' => 'Owner Identity']) ?>
    
        <?= $form->field($model, 'owner_gender')->textInput(['placeholder' => 'Owner Gender']) ?>
    
        <?= $form->field($model, 'owner_email')->textInput(['maxlength' => true, 'placeholder' => 'Owner Email']) ?>
    
        <?= $form->field($model, 'nour_rep_phone')->textInput(['maxlength' => true, 'placeholder' => 'Nour Rep Phone']) ?>
    
        <?= $form->field($model, 'owner_id')->textInput(['placeholder' => 'Owner']) ?>
   
        <?= $form->field($model, 'lock')->textInput(['placeholder' => 'Lock']) ?>
   

    

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('backend', 'SchoolsProfile')),
            'content' => $this->render('_formSchoolsProfile', [
                'form' => $form,
                'SchoolsProfile' => is_null($model->schoolsProfile) ? new backend\models\SchoolsProfile() : $model->schoolsProfile,
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
    <div class="form-group row">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('backend', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
