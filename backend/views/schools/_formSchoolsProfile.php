<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolsProfile */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="schools-form grid-form">
    
        
             <?= $form->field($SchoolsProfile, 'institution_year')->textInput(['placeholder' => 'Institution Year']) ?>
       
            <?= $form->field($SchoolsProfile, 'no_of_classes')->textInput(['placeholder' => 'No Of Classes']) ?>
       
            <?= $form->field($SchoolsProfile, 'no_students_boys')->textInput(['placeholder' => 'No Students Boys']) ?>
       
            <?= $form->field($SchoolsProfile, 'no_students_girls')->textInput(['placeholder' => 'No Students Girls']) ?>
        
            <?= $form->field($SchoolsProfile, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Address']) ?>
        
            <?= $form->field($SchoolsProfile, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>
        
        <?= $form->field($SchoolsProfile, 'phone_2')->textInput(['maxlength' => true, 'placeholder' => 'Phone 2']) ?>
        
            <?= $form->field($SchoolsProfile, 'mobile')->textInput(['maxlength' => true, 'placeholder' => 'Mobile']) ?>
       
            <?= $form->field($SchoolsProfile, 'mobile_2')->textInput(['maxlength' => true, 'placeholder' => 'Mobile 2']) ?>
        
            <?= $form->field($SchoolsProfile, 'mailbox')->textInput(['maxlength' => true, 'placeholder' => 'Mailbox']) ?>
        
            <?= $form->field($SchoolsProfile, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
        
            <?= $form->field($SchoolsProfile, 'website')->textInput(['maxlength' => true, 'placeholder' => 'Website']) ?>
       
            <?= $form->field($SchoolsProfile, 'facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook']) ?>
        
            <?= $form->field($SchoolsProfile, 'youtube')->textInput(['maxlength' => true, 'placeholder' => 'Youtube']) ?>
        
            <?= $form->field($SchoolsProfile, 'twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter']) ?>
        
            <?= $form->field($SchoolsProfile, 'instagram')->textInput(['maxlength' => true, 'placeholder' => 'Instagram']) ?>
        

</div>
