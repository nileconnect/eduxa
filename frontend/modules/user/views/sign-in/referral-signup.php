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


<div class="auth-content">
    <div class="auth-info" style="background-image: url('img/auth.jpg');">
        <?php
        $this->beginContent('@frontend/views/layouts/_shareWidget.php');
        $this->endContent() ;
        $this->beginContent('@frontend/views/layouts/_whyChoosUs.php');
        $this->endContent() ;
        ?>
    </div>
    <div class="auth-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title"><?= Yii::t('frontend', 'Signup'); ?></h2>
                    <div class="tab-pills">

                        <ul class="nav nav-pills" id="myTab">
                            <li class="nav-item">
                                <!-- <a class="nav-link active" id="sign-individual-tab" data-toggle="tab" href="#tabIndividual" role="tab" aria-controls="undergraduate" aria-selected="true"><i class="fas fa-user"></i> <?= Yii::t('frontend', 'individual referral'); ?></a> -->
                                <a class="nav-link active" id="sign-individual-tab" href="/referral-signup" ><i class="fas fa-user"></i> <?= Yii::t('frontend', 'individual referral'); ?></a>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link" id="company-referral-tab" data-toggle="tab" href="#tabCompanyReferral" role="tab" aria-controls="graduate" aria-selected="true"><i class="fas fa-users"></i> <?= Yii::t('frontend', 'Company referral'); ?></a> -->
                                <a class="nav-link" id="company-referral-tab"  href="/referral-company" ><i class="fas fa-users"></i> <?= Yii::t('frontend', 'Company referral'); ?></a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabIndividual" role="tabpanel" aria-labelledby="sign-individual-tab">

                               <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'firstname')->textInput(['placeholder'=>Yii::t('common','First Name')])
                                        ->label(Yii::t('common','First Name') ,['class'=>'label-control']); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'lastname')->textInput(['placeholder'=>Yii::t('common','Last Name')])
                                            ->label(Yii::t('common','Last Name') ,['class'=>'label-control']); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo $form->field($model, 'mobile')->textInput(['placeholder'=>Yii::t('common','Mobile Number')])
                                                ->label(Yii::t('common','Mobile Number') ,['class'=>'label-control']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo $form->field($model, 'email')->textInput(['placeholder'=>Yii::t('common','Email Address')])
                                                ->label(Yii::t('common','Email Address') ,['class'=>'label-control']); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php  echo $form->field($model, 'password')->widget(PasswordInput::classname(),[
                                            'options' => ['id'=> 'valdiate-password'],
                                        ]); ?>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'password_confirm')->passwordInput(['placeholder'=>Yii::t('common','********')])
                                            ->label(Yii::t('common','Confirm Password') ,['class'=>'label-control','id'=>'valdiate-password-confirm']);?>
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
                                    <div class="col-sm-6">
                                        <?php
                                        // Child # 1
                                        echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
                                            'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->all(), 'id', 'title') : [],
                                            'options'=>['id'=>'City-id'],
                                            'pluginOptions'=>[
                                                'depends'=>['CountryId'],
                                                'placeholder'=>'Select...',
                                                'url'=>Url::to(['/helper/states'])
                                            ]
                                        ]);

                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php
                                        // Child # 1
                                        echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                                            'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->city_id])->all(), 'id', 'title') : [],
                                            'options'=>['id'=>'subcat-id'],
                                            'pluginOptions'=>[
                                                'depends'=>['City-id'],
                                                'placeholder'=>'Select...',
                                                'url'=>Url::to(['/helper/cities'])
                                            ]
                                        ]);

                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'no_of_students')->textInput(['placeholder'=>Yii::t('common','No. Of Previous Referrals')])
                                            ->label(Yii::t('frontend','No. Of Previous Referrals') ,['class'=>'label-control']);
                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'students_nationalities')->textInput(['placeholder'=>Yii::t('common','Nationality Of Referrals')])
                                            ->label(Yii::t('frontend','Nationality Of Referrals') ,['class'=>'label-control']);
                                        ?>
                                    </div>
                                </div>

                                <?php
                                echo $form->field($model ,'find_us_from')->dropDownList(\common\models\UserProfile::ListFindUs() ,
                                    ['prompt'=>Yii::t('common','Select')])
                                    ->label(Yii::t('common','How did you found us?') ,['class'=>'label-control']);
                                ?>


                                <?php echo $form->field($model, 'expected_no_of_students')->textInput(['placeholder'=>Yii::t('common', 'Expected No. Of Referrals To Apply For By Eduxa')])
                                    ->label(Yii::t('common', 'Expected No. Of Referrals To Apply For By Eduxa') ,['class'=>'label-control']);
                                ?>



                                <div class="form-group mtxlg">
                                    <?php echo Html::submitButton(Yii::t('frontend', 'Register'), ['class' => 'button button-primary button-wide text-large', 'name' => 'signup-referral']) ?>
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
        </div>
    </div>

</div>

<?php
$script = <<< JS
    // LINK TO TABS
$(document).ready(() => {
  var url = window.location.href;
  if (url.indexOf("#") > 0){
      
    var activeTab = url.substring(url.indexOf("#") + 1);
   
    $('#myTab li a[href="#'+activeTab+'"]').tab('show')
  }

  $('a[role="tab"]').on("click", function() {
    var newUrl;
    const hash = $(this).attr("href");
      newUrl = url.split("#")[0] + hash;
    history.replaceState(null, null, newUrl);
  });
});

JS;
$this->registerJs($script);
?>
<script>

</script>
