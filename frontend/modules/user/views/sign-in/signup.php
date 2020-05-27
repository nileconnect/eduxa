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

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
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
                                    'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->country_id])->asArray()->all(), 'id', 'title') : [],
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
                            'data' =>$model->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->city_id])->asArray()->all(), 'id', 'title') : [],
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
                            ->label(Yii::t('frontend','How did you found us?') ,['class'=>'label-control']);
                        ?>

                    <?php
                        echo $form->field($model ,'communtication_channel')->dropDownList(\common\models\UserProfile::ListCommunicateChannels() ,
                            ['prompt'=>Yii::t('common','Select')])
                            ->label(Yii::t('frontend','Best way to commuincation?') ,['class'=>'label-control']);
                        ?>

                        <div class="form-group">
                            <label for="" id="" class="label-control"><?= Yii::t('frontend', 'What are you interested in?'); ?> </label>
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
                            <div class="text-large"> <?= Yii::t('frontend', 'Already Member?'); ?>
                                <a href="/login"> <?= Yii::t('frontend', 'Sign in!'); ?> </a></div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
