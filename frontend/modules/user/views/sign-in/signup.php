<?php
use yii\helpers\Url;
use yii\helpers\Html;

use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

$this->title = Yii::t('frontend', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>

<style>

.select2.select2-container{
    direction: rtl !important;
}
</style>
<div class="auth-content">
    <div class="auth-info" style="background-image: url('img/auth.jpg');">
        <?php
        $this->beginContent('@frontend/views/layouts/_shareWidget.php');
        $this->endContent() ;
        $this->beginContent('@frontend/views/layouts/_whyChoosUslogin.php');
        $this->endContent() ;
        ?>
    </div>
    <div class="auth-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Yii::t('frontend', 'Signup'); ?></h2>

                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo $form->field($model, 'firstname')->textInput(['placeholder'=>Yii::t('common','your first name')])
                                ->label(Yii::t('common','First Name(s)') ,['class'=>'label-control']); ?>
                            </div>
                            <div class="col-sm-6">
                                <?php echo $form->field($model, 'lastname')->textInput(['placeholder'=>Yii::t('common','your last name')])
                                    ->label(Yii::t('common','Family Name') ,['class'=>'label-control']); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php
                                    echo $form->field($model ,'gender')->dropDownList(\common\models\UserProfile::ListGender() ,['prompt'=>Yii::t('common','Select')])
                                        ->label(Yii::t('common','Gender') ,['class'=>'label-control']);
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo $form->field($model, 'email')->textInput(['placeholder'=>Yii::t('common','write your email address')])
                                        ->label(Yii::t('common','E-Mail Address') ,['class'=>'label-control']); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 password-wrapper">
                                <?php //echo $form->field($model, 'password') ?>
                                <?php 
                                    echo $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('common','******************')])
                                    ->label(Yii::t('common','Password') ,['class'=>'label-control','id'=>'password-field']);
                                ?>

                                <div class="icon-wrapper">
                                    <span toggle="#password-field" class="field-icon toggle-password"><i class="fas fa-eye"></i></span>
                                </div>

                                <div class="strength-lines">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <?php echo $form->field($model, 'password_confirm')->passwordInput(['placeholder'=>Yii::t('common','******************')])
                                    ->label(Yii::t('common','Confirm Password') ,['class'=>'label-control']);?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                                    'options' => ['placeholder' => Yii::t('common', 'Choose Country') ,'id'=>'CountryId'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]); ?>
                            </div>
                            
                        </div>

                        <div class="row">
                            
                            <div class="col-sm-6">
                                <?php
                                // Child # 1
                                echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
                                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->all(), 'id', 'title') : [],
                                    'options'=>['id'=>'City-id'],
                                    'pluginOptions'=>[
                                        'depends'=>['CountryId'],
                                        'placeholder'=>Yii::t('common', 'Select'),
                                        'url'=>Url::to(['/helper/states'])
                                    ]
                                ]);

                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?php
                                    echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                                        'data' =>$model->state_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->state_id])->all(), 'id', 'title') : [],
                                        'options'=>['id'=>'subcat-id'],
                                        'pluginOptions'=>[
                                            'depends'=>['City-id'],
                                            'placeholder'=>Yii::t('common', 'Select'),
                                            'url'=>Url::to(['/helper/cities'])
                                        ]
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php

//                                echo $form->field($model, 'mobile')->textInput(['placeholder'=>Yii::t('common','your phone number')])
//                                    ->label(Yii::t('common','Mobile Number') ,['class'=>'label-control']);
                                echo $form->field($model, 'mobile')->widget(\borales\extensions\phoneInput\PhoneInput::className(), [
                                    'jsOptions' => [
                                        'preferredCountries' => ['sa', 'us', 'eg'],
                                    ]
                                ]);

                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?php echo $form->field($model, 'nationality')->textInput(['placeholder'=>Yii::t('common','your Nationality')])
                                    ->label(Yii::t('common','Nationality') ,['class'=>'label-control']);
                                ?>
                            </div>
                        </div>

                        <?php
                        echo $form->field($model ,'find_us_from')->dropDownList(\common\models\UserProfile::ListFindUs() ,
                            ['prompt'=>Yii::t('common','--where--')])
                            ->label(Yii::t('frontend','How did you know about Eduxa?') ,['class'=>'label-control']);
                        ?>

                    <?php
                        echo $form->field($model ,'communtication_channel')->dropDownList(\common\models\UserProfile::ListCommunicateChannels() ,
                            ['prompt'=>Yii::t('common','--How--')])
                            ->label(Yii::t('frontend','Best way to reach me') ,['class'=>'label-control']);
                        ?>

                        <div class="form-group">
                            <label for="" id="" class="label-control"><?= Yii::t('frontend', "I'm interested in"); ?> </label>
                            <div class="form-check-group">

                                <div class="form-check" style="display:block">
                                    <?php
                                    echo $form->field($model ,'interested_in_university')->checkbox();
                                    ?>
                                </div>
                                <div class="form-check" style="display:block">
                                    <?php  echo $form->field($model ,'interested_in_schools')->checkbox(); ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group mtxlg">
                            <?php echo Html::submitButton(Yii::t('frontend', 'Register'), ['class' => 'button button-primary button-wide text-large', 'name' => 'signup-button']) ?>
                        </div>

                        <div class="form-group mtmd">
                            <div class="text-large"> <?= Yii::t('frontend', 'Already Member?'); ?>
                                <a href="/login"> <?= Yii::t('frontend', 'Sign in!'); ?> </a></div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="successMsg <?php if(Yii::$app->session->hasFlash('alert-create-account-referral-successfully')) echo 'show'; ?>">
    <img src="/img/success.png">
    <h3><?=  Yii::t('frontend','Congratulations') ?>,</h3>
    <p><?= Yii::t('frontend','Your Account Successfully Created, and we will be verified your account by our team.')?></p>
    <a class="button button-primary" href="/login"><?= Yii::t('frontend','Home')?></a>
</div>





<?php 
$js = <<<JS
$(document).ready(function() {
	
	// hide/show password
	$(".icon-wrapper").click(function() {
		$(".toggle-password i").toggleClass(".fas fa-eye-slash");
		var input = $("#signupform-password");
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	// strength validation on keyup-event
	$("#signupform-password").on("keyup", function() {
        
		var val = $(this).val(),
			color = testPasswordStrength(val);

		styleStrengthLine(color, val);
	});

	// check password strength
	function testPasswordStrength(value) {
        console.log("here")
		var strongRegex = new RegExp(
      '^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[=/\()%ยง!@#$%^&*])(?=.{8,})'
			),
			mediumRegex = new RegExp(
				'^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})'
			);

		if (strongRegex.test(value)) {
			return "green";
		} else if (mediumRegex.test(value)) {
			return "orange";
		} else {
			return "red";
		}
	}

	function styleStrengthLine(color, value) {
		$(".line")
			.removeClass("bg-red bg-orange bg-green")
			.addClass("bg-transparent");
		
		if (value) {
			
			if (color === "red") {
				$(".line:nth-child(1)")
					.removeClass("bg-transparent")
					.addClass("bg-red");
			} else if (color === "orange") {
				$(".line:not(:last-of-type)")
					.removeClass("bg-transparent")
					.addClass("bg-orange");
			} else if (color === "green") {
				$(".line")
					.removeClass("bg-transparent")
					.addClass("bg-green");
			}
		}
	}

});

JS;
$this->registerJs($js);
?>