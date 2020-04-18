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
        <div class="container">
            <div class="auth-info-content text-large text-white">
                <h2 class="title title-white"> Why you choose us?</h2>
                <div class="mtsm"><span><img src="img/icons/language.svg" alt=""></span> Find the best language school for you</div>
                <div class="mtsm"><span><img src="img/icons/advertising.svg" alt=""></span> Get to know the latest offers first</div>
                <div class="mtsm"><span><img src="img/icons/paste.svg" alt=""></span> We finish all the paper work for you</div>
                <div class="mtsm"><span><img src="img/icons/review.png" alt=""></span> Very trusted offers</div>
                <div class="mtsm"><span><img src="img/icons/language.svg" alt=""></span> Find the best language school for you</div>
                <div class="mtsm"><span><img src="img/icons/advertising.svg" alt=""></span> Get to know the latest offers first</div>
                <div class="mtsm"><span><img src="img/icons/paste.svg" alt=""></span> We finish all the paper work for you</div>
                <div class="mtsm"><span><img src="img/icons/review.png" alt=""></span> Very trusted offers</div>
                <div class="mtsm"><span><img src="img/icons/language.svg" alt=""></span> Find the best language school for you</div>
                <div class="mtsm"><span><img src="img/icons/advertising.svg" alt=""></span> We finish all the paper work for you</div>
            </div>
        </div>

        <ul class="flaoted-socials">
            <li><a href="#"><i class="fas fa-phone"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href=""><i class="fas fa-share-alt"></i></a></li>
        </ul>
    </div>
    <div class="auth-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="title">Sign Up</h2>

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
                                    <?php
                                    echo $form->field($model ,'gender')->dropDownList(\common\models\UserProfile::ListGender() ,['prompt'=>Yii::t('common','Select')])
                                        ->label(Yii::t('common','Gender') ,['class'=>'label-control']);
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

<!--                        <div class="row">-->
<!--                            <div class="col-sm-6">-->
<!--                                --><?//= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
//                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
//                                    'options' => ['placeholder' => Yii::t('backend', 'Choose Country') ,'id'=>'CountryId'],
//                                    'pluginOptions' => [
//                                        'allowClear' => true
//                                    ],
//                                ]); ?>
<!--                            </div>-->
<!--                            <div class="col-sm-6">-->
<!--                                --><?php
//                                // Child # 1
//                                echo $form->field($model, 'state_id')->widget(DepDrop::classname(), [
//                                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->asArray()->all(), 'id', 'title') : [],
//                                    'options'=>['id'=>'City-id'],
//                                    'pluginOptions'=>[
//                                        'depends'=>['CountryId'],
//                                        'placeholder'=>'Select...',
//                                        'url'=>Url::to(['/helper/states'])
//                                    ]
//                                ]);
//
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                        <div class="col-sm-6">-->
<!--                        --><?php
//                        // Child # 1
//                        echo $form->field($model, 'city_id')->widget(DepDrop::classname(), [
//                            'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->city_id])->asArray()->all(), 'id', 'title') : [],
//                            'options'=>['id'=>'subcat-id'],
//                            'pluginOptions'=>[
//                                'depends'=>['City-id'],
//                                'placeholder'=>'Select...',
//                                'url'=>Url::to(['/helper/cities'])
//                            ]
//                        ]);
//
//                        ?>
<!--                        </div>-->
<!---->
<!--                    </div>-->


                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo $form->field($model, 'mobile')->textInput(['placeholder'=>Yii::t('common','Mobile Number')])
                                    ->label(Yii::t('common','Mobile Number') ,['class'=>'label-control']); ?>
                            </div>
                            <div class="col-sm-6">
                                <?php echo $form->field($model, 'nationality')->textInput(['placeholder'=>Yii::t('common','Nationality')])
                                    ->label(Yii::t('common','Nationality') ,['class'=>'label-control']);
                                ?>
                            </div>
                        </div>

                        <?php
                        echo $form->field($model ,'find_us_from')->dropDownList(\common\models\UserProfile::ListFindUs() ,
                            ['prompt'=>Yii::t('common','Select')])
                            ->label(Yii::t('common','How did you found us?') ,['class'=>'label-control']);
                        ?>

                    <?php
                        echo $form->field($model ,'communtication_channel')->dropDownList(\common\models\UserProfile::ListCommunicateChannels() ,
                            ['prompt'=>Yii::t('common','Select')])
                            ->label(Yii::t('common','Best way to commuincation?') ,['class'=>'label-control']);
                        ?>

                        <div class="form-group">
                            <label for="" id="" class="label-control">What are you interested in?</label>
                            <div class="form-check-group">

                                <div class="form-check">
                                    <?php
                                    echo $form->field($model ,'interested_in_university')->checkbox();
                                    ?>
                                </div>
                                <div class="form-check">
                                    <?php  echo $form->field($model ,'interested_in_schools')->checkbox(); ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group mtxlg">
                            <?php echo Html::submitButton(Yii::t('frontend', 'Register'), ['class' => 'button button-primary button-wide text-large', 'name' => 'signup-button']) ?>
                        </div>

                        <div class="form-group mtmd">
                            <div class="text-large">Already Member? <a href="#">Sign in!</a></div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
