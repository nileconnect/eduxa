<?php

use yii\helpers\Html;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\UserProfile;
use trntv\filekit\widget\Upload;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */

$model->roles =Yii::$app->session->get('UserRole');



?>

<?php

if($saved == true){
    $this->registerJs("$(function() {
          parent.jQuery.fancybox.getInstance().close();
           parent.location.reload();
       });
    ");
}

?>
<div class="container-fluid orgmanager">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="row mb-2">
        <div class="col-md-6">
            
        </div>

        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.content-header -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark"><?php echo Yii::t('common', 'University Manager') ?></h1>
                    </div>
                </div>
                <?php $form = ActiveForm::begin([
                        'action'=>'/university/manager?id='.$id
                ]) ?>

                <?= $form->errorSummary($model) ?>
                <?php echo $form->field($profile, 'picture')->widget(Upload::class, [
                            'url'=>['avatar-upload']
                        ]) ?>
                <div class="row">
                    <div class="col-sm-4">
                        <?php echo $form->field($model, 'email') ?>
                    </div>
                    <div class="col-sm-8">
                        <?php 
                            echo $form->field($model, 'password')->widget(PasswordInput::classname());
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <?php echo $form->field($profile, 'firstname') ?>
                    </div>
                    <div class="col-sm-4">
                        <?php echo $form->field($profile, 'lastname') ?>
                    </div>
                    <div class="col-sm-4">
                        <?php echo $form->field($profile, 'gender')->dropDownlist([
                            UserProfile::GENDER_MALE => Yii::t('backend', 'Male'),
                            UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female')
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <?php echo $form->field($profile, 'mobile') ?>
                    </div>
                    <div class="col-sm-4">
                        <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
                    </div>
                    <div class="col-sm-4">
                        <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary','style'=>'margin-top: 31px;width: 150px;', 'name' => 'signup-button']) ?>
                    </div>

                </div>
                <div class="row">
                    
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>
</div>

