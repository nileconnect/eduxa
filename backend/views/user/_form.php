<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\UserProfile;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use yii\web\JsExpression;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */

$model->roles =Yii::$app->session->get('UserRole');
?>
    <div class="schools-form  innerForms">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->errorSummary($model) ?>

        <div class="col-md-12">
                        <?php echo $form->field($profile, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
                                        'url'=>['avatar-upload']
                         ]) ?>
                    </div>
        <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($model, 'email')->textInput() ?>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <?php //echo $form->field($model, 'password')->passwordInput() ?>
                           <?php  echo $form->field($model, 'password')->widget(PasswordInput::classname()); ?>

                        </div>
                    </div>
        <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($profile, 'firstname')->textInput()  ?>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($profile, 'lastname')->textInput()  ?>
                        </div>
                        <div class="col-md-4 col-sm-12">

                            <?php echo $form->field($profile, 'gender')->dropDownlist([
                    UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
                    UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
                ]) ?>
                        </div>

                    </div>


        <div class="form-group row">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end() ?>

    </div>
