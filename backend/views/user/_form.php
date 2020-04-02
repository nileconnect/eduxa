<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\UserProfile;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */

$model->roles =Yii::$app->session->get('UserRole');

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'StudentCertificate',
        'relID' => 'student-certificate',
        'value' => \yii\helpers\Json::encode($userModel->studentCertificates),
        'isNewRecord' => ($userModel->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'StudentTestResults',
        'relID' => 'student-test-results',
        'value' => \yii\helpers\Json::encode($userModel->studentTestResults),
        'isNewRecord' => ($userModel->isNewRecord) ? 1 : 0
    ]
]);

?>
    <div class="schools-form  innerForms">

        <?php $form = ActiveForm::begin() ?>




        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <!-- <li class="pull-left header">
                    <ion-icon name="person"></ion-icon>
                    <?php echo Yii::t('backend', 'User Details') ?> </li> -->
                <li class="active">
                    <a href="#tab_1-1" data-toggle="tab" aria-expanded="true">
                        <?php echo Yii::t('backend', 'Main Details') ?>
                    </a>
                </li>
                <li>
                    <a href="#tab_2-2" data-toggle="tab" aria-expanded="false">
                        <?php echo Yii::t('backend', 'Permissions') ?>
                    </a>
                </li>

                <li>
                    <a href="#tab_3-3" data-toggle="tab" aria-expanded="false">
                        <?php echo Yii::t('backend', 'Profile Data') ?>
                    </a>
                </li>
                <?php
                if(   $model->getModel()->id  > 0 &&  User::IsRole($model->getModel()->id , User::ROLE_USER)){
                   ?>

                    <li>
                        <a href="#tab_4-4" data-toggle="tab" aria-expanded="false">
                            <?php echo Yii::t('backend', 'Certificates') ?>
                        </a>
                    </li>

                    <li>
                        <a href="#tab_5-5" data-toggle="tab" aria-expanded="false">
                            <?php echo Yii::t('backend', 'Test Results') ?>
                        </a>
                    </li>
                    <?
                }

                ?>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">

                    <div class="col-md-12">
                        <?php echo $form->field($profile, 'picture')->widget(\trntv\filekit\widget\Upload::class, [
                'url'=>['avatar-upload']
            ]) ?>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($model, 'email') ?>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($model, 'password')->passwordInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($profile, 'firstname') ?>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <?php echo $form->field($profile, 'lastname') ?>
                        </div>
                        <div class="col-md-4 col-sm-12">

                            <?php echo $form->field($profile, 'gender')->dropDownlist([
                    UserProfile::GENDER_FEMALE => Yii::t('backend', 'Female'),
                    UserProfile::GENDER_MALE => Yii::t('backend', 'Male')
                ]) ?>
                        </div>

                    </div>


                </div>

                <div class="tab-pane" id="tab_2-2">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <?php         echo $form->field($model, 'roles')->dropDownList(User::ListRoles(), ['prompt' =>Yii::t('common', 'Select')]); ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab_3-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="well">
                                <?= $form->field($profile, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
                                    'options' => ['placeholder' => Yii::t('backend', 'Choose Country') ,'id'=>'CountryId'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="well">
                                <?php
                                // Child # 1
                                echo $form->field($profile, 'city_id')->widget(DepDrop::classname(), [
                                    'data' =>$profile->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$profile->country_id])->asArray()->all(), 'id', 'title') : [],
                                    'options'=>['id'=>'subcat-id'],
                                    'pluginOptions'=>[
                                        'depends'=>['CountryId'],
                                        'placeholder'=>'Select...',
                                        'url'=>Url::to(['/helper/cities'])
                                    ]
                                ]);

                                ?>

                            </div>
                        </div>
                    </div>


               <?php
                if($model->roles == User::ROLE_REFERRAL_COMPANY ) {
               ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <?php  echo $form->field($profile, 'mobile')->textInput() ?>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <?php  echo $form->field($profile, 'expected_no_of_students')->textInput() ?>
                        </div>

                    </div>
               <?php
                 }
               ?>
                    <div style=" display: <?= $model->roles == User::ROLE_REFERRAL_COMPANY ? 'block':'none'?>">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'telephone_no')->textInput() ?>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'job_title')->textInput() ?>
                            </div>

                        </div>
                    </div>

                    <div style=" display: <?= $model->roles == User::ROLE_REFERRAL_PERSON ? 'block':'none'?>">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'no_of_students')->textInput() ?>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'students_nationalities')->textInput() ?>
                            </div>

                        </div>
                    </div>


                    <div style=" display: <?= $model->roles == User::ROLE_USER ? 'block':'none'?>">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'nationality')->textInput() ?>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'interested_in')->textInput() ?>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'find_us_from')->textInput() ?>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <?php  echo $form->field($profile, 'communtication_channel')->textInput() ?>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="tab_4-4">
                    <h2> No Certificate has been addedd</h2>

                </div>


                <div class="tab-pane" id="tab_5-5">

                    <h2> No Test Results has been addedd</h2>




                </div>

                </div>
        </div>
        <div class="form-group row">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    </div>






    <?php ActiveForm::end() ?>