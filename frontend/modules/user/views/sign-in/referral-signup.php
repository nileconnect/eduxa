<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;

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
                                <a class="nav-link active" id="sign-individual-tab" data-toggle="tab" href="#tabIndividual" role="tab" aria-controls="undergraduate" aria-selected="true"><i class="fas fa-user"></i> <?= Yii::t('frontend', 'individual referral'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="company-referral-tab" data-toggle="tab" href="#tabCompanyReferral" role="tab" aria-controls="graduate" aria-selected="true"><i class="fas fa-users"></i> <?= Yii::t('frontend', 'Company referral'); ?></a>
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
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'password')->passwordInput()
                                            ->label(Yii::t('common','Password') ,['class'=>'label-control']);?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($model, 'password_confirm')->passwordInput()
                                            ->label(Yii::t('common','Confirm Password') ,['class'=>'label-control']);?>
                                    </div>
                                </div>

                                <div class="row">
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
                                </div>
                                <div class="row">
                                 <div class="col-sm-12">
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


                                <?php echo $form->field($model, 'expected_no_of_students')->textInput(['placeholder'=>Yii::t('common','Expected No. Of Students To Apply For By Eduxa')])
                                    ->label(Yii::t('frontend','Expected No. Of Students To Apply For By Eduxa') ,['class'=>'label-control']);
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
                            <div class="tab-pane fade" id="tabCompanyReferral" role="tabpanel" aria-labelledby="company-referral-tab">

                                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'firstname')->textInput(['placeholder'=>Yii::t('common','First Name')])
                                            ->label(Yii::t('common','First Name') ,['class'=>'label-control']); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'lastname')->textInput(['placeholder'=>Yii::t('common','Last Name')])
                                            ->label(Yii::t('common','Last Name') ,['class'=>'label-control']); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'job_title')->textInput(['placeholder'=>Yii::t('common','Job Title')])
                                            ->label(Yii::t('common','Job Title') ,['class'=>'label-control']); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'company_name')->textInput(['placeholder'=>Yii::t('common','Company Name')])
                                            ->label(Yii::t('common','Company Name') ,['class'=>'label-control']); ?>
                                    </div>
                                </div>

                                <?php echo $form->field($modelCompany, 'telephone_no')->textInput(['placeholder'=>Yii::t('common','Telephone Number')])
                                    ->label(Yii::t('common','Telephone Number') ,['class'=>'label-control']);
                                ?>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo $form->field($modelCompany, 'mobile')->textInput(['placeholder'=>Yii::t('common','Mobile Number')])
                                                ->label(Yii::t('common','Mobile Number') ,['class'=>'label-control']);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php echo $form->field($modelCompany, 'email')->textInput(['placeholder'=>Yii::t('common','Email Address')])
                                                ->label(Yii::t('common','Email Address') ,['class'=>'label-control']); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'password')->passwordInput()
                                            ->label(Yii::t('common','Password') ,['class'=>'label-control']);?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'password_confirm')->passwordInput()
                                            ->label(Yii::t('common','Confirm Password') ,['class'=>'label-control']);?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <?= $form->field($modelCompany, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                                            'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->all(), 'id', 'title'),
                                            'options' => ['placeholder' => Yii::t('backend', 'Choose Country') ,'id'=>'CountryId2'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php
                                        // Child # 1
                                        echo $form->field($modelCompany, 'state_id')->widget(DepDrop::classname(), [
                                            'data' =>$modelCompany->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$modelCompany->country_id])->all(), 'id', 'title') : [],
                                            'options'=>['id'=>'City-id2'],
                                            'pluginOptions'=>[
                                                'depends'=>['CountryId2'],
                                                'placeholder'=>'Select...',
                                                'url'=>Url::to(['/helper/states'])
                                            ]
                                        ]);

                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php
                                        // Child # 1
                                        echo $form->field($modelCompany, 'city_id')->widget(DepDrop::classname(), [
                                            'data' =>$modelCompany->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$modelCompany->city_id])->all(), 'id', 'title') : [],
                                            //'options'=>['id'=>'subcat-id'],
                                            'pluginOptions'=>[
                                                'depends'=>['City-id2'],
                                                'placeholder'=>'Select...',
                                                'url'=>Url::to(['/helper/cities'])
                                            ]
                                        ]);

                                        ?>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'no_of_students')->textInput(['placeholder'=>Yii::t('common','No. Of Previous Referrals')])
                                            ->label(Yii::t('frontend','No. Of Previous Referrals') ,['class'=>'label-control']);
                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php echo $form->field($modelCompany, 'students_nationalities')->textInput(['placeholder'=>Yii::t('common','Nationality Of Referrals')])
                                            ->label(Yii::t('frontend','Nationality Of Referrals') ,['class'=>'label-control']);
                                        ?>
                                    </div>
                                </div>

                                <?php
                                echo $form->field($modelCompany ,'find_us_from')->dropDownList(\common\models\UserProfile::ListFindUs() ,
                                    ['prompt'=>Yii::t('common','Select')])
                                    ->label(Yii::t('common','How did you found us?') ,['class'=>'label-control']);
                                ?>



                                <?php echo $form->field($modelCompany, 'expected_no_of_students')->textInput(['placeholder'=>Yii::t('common','Expected No. Of Students To Apply For By Eduxa')])
                                    ->label(Yii::t('frontend','Expected No. Of Students To Apply For By Eduxa') ,['class'=>'label-control']);
                                ?>



                                <div class="form-group mtxlg">
                                    <?php echo Html::submitButton(Yii::t('frontend', 'Register'), ['class' => 'button button-primary button-wide text-large', 'name' => 'signup-referral-company']) ?>
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
<div class="successMsg">
    <img src="/img/success.png">
    <h3>Congratulations,</h3>
    <p>Your Account Successfully Created, Please check your email inbox to activate your account.</p>
        <a class="button button-primary" href="/">Home</a>

     
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
