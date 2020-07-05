<?php
use yii\helpers\Url;
use yii\helpers\Html;

use kartik\depdrop\DepDrop;
use yii\widgets\ActiveForm;
use kartik\password\PasswordInput;
if($saved){
    $this->registerJs("$(function() {
          parent.jQuery.fancybox.getInstance().close();
           parent.location.reload();

     });
     
       ");
}

?>
<div class="modal-body">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <h2 class="title title-sm"><?php echo Yii::t('frontend', 'Profile settings') ?></h2>

    <?php
//    echo $form->field($profile, 'picture')->widget(
//        Upload::class,
//        [
//            'url' => ['avatar-upload']
//        ]
//    );
    ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $form->field($profile, 'firstname')->textInput(['placeholder'=>Yii::t('common','First Name')])
                ->label(Yii::t('common','First Name') ,['class'=>'label-control']); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($profile, 'lastname')->textInput(['placeholder'=>Yii::t('common','Last Name')])
                ->label(Yii::t('common','Last Name') ,['class'=>'label-control']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php
                echo $form->field($profile ,'gender')->dropDownList(\common\models\UserProfile::ListGender() ,['prompt'=>Yii::t('common','Select')])
                    ->label(Yii::t('common','Gender') ,['class'=>'label-control']);
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($profile, 'mobile')->textInput(['placeholder'=>Yii::t('common','Mobile Number')])
                    ->label(Yii::t('common','Mobile Number') ,['class'=>'label-control']); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($profile, 'country_id')->widget(\kartik\widgets\Select2::classname(), [
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
            echo $form->field($profile, 'state_id')->widget(DepDrop::classname(), [
                'data' =>$profile->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$profile->country_id])->all(), 'id', 'title') : [],
                'options'=>['id'=>'State-id'],
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
        <div class="col-sm-6">
            <?php
            // Child # 1
            echo $form->field($profile, 'city_id')->widget(DepDrop::classname(), [
                'data' =>$profile->state_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$profile->state_id])->all(), 'id', 'title') : [],
                'options'=>['id'=>'subcat-id'],
                'pluginOptions'=>[
                    'depends'=>['State-id'],
                    'placeholder'=>'Select...',
                    'url'=>Url::to(['/helper/cities'])
                ]
            ]);

            ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($profile, 'nationality')->textInput(['placeholder'=>Yii::t('common','Nationality')])
                ->label(Yii::t('common','Nationality') ,['class'=>'label-control']);
            ?>
        </div>
    </div>

    <?php
    echo $form->field($profile ,'communtication_channel')->dropDownList(\common\models\UserProfile::ListCommunicateChannels() ,
        ['prompt'=>Yii::t('common','Select')])
        ->label(Yii::t('frontend','Best way to commuincation?') ,['class'=>'label-control']);
    ?>

    <div class="form-group">
        <label for="" id="" class="label-control"><?= Yii::t('frontend', 'What are you interested in?'); ?> </label>
        <div class="form-check-group">

            <div class="form-check">
                <?php
                echo $form->field($profile ,'interested_in_university')->checkbox();
                ?>
            </div>
            <div class="form-check">
                <?php  echo $form->field($profile ,'interested_in_schools')->checkbox(); ?>

            </div>
        </div>
    </div>


    <h2 class="title title-sm"><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

    <?php // echo $form->field($accountForm, 'email') ?>
    <div class="row">
        <div class="col-sm-6">
            <?php  echo $form->field($accountForm, 'password')->widget(PasswordInput::classname()); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($accountForm, 'password_confirm')->passwordInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'button button-wide button-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
