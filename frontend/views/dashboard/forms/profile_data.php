<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
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
//    echo $form->field($model->getModel('profile'), 'picture')->widget(
//        Upload::class,
//        [
//            'url' => ['avatar-upload']
//        ]
//    );
    ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $form->field($model->getModel('profile'), 'firstname')->textInput(['placeholder'=>Yii::t('common','First Name')])
                ->label(Yii::t('common','First Name') ,['class'=>'label-control']); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model->getModel('profile'), 'lastname')->textInput(['placeholder'=>Yii::t('common','Last Name')])
                ->label(Yii::t('common','Last Name') ,['class'=>'label-control']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php
                echo $form->field($model->getModel('profile') ,'gender')->dropDownList(\common\models\UserProfile::ListGender() ,['prompt'=>Yii::t('common','Select')])
                    ->label(Yii::t('common','Gender') ,['class'=>'label-control']);
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model->getModel('profile'), 'mobile')->textInput(['placeholder'=>Yii::t('common','Mobile Number')])
                    ->label(Yii::t('common','Mobile Number') ,['class'=>'label-control']); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model->getModel('profile'), 'country_id')->widget(\kartik\widgets\Select2::classname(), [
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
            echo $form->field($model->getModel('profile'), 'state_id')->widget(DepDrop::classname(), [
                'data' =>$model->getModel('profile')->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->getModel('profile')->country_id])->asArray()->all(), 'id', 'title') : [],
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
            echo $form->field($model->getModel('profile'), 'city_id')->widget(DepDrop::classname(), [
                'data' =>$model->getModel('profile')->state_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->getModel('profile')->state_id])->asArray()->all(), 'id', 'title') : [],
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
            <?php echo $form->field($model->getModel('profile'), 'nationality')->textInput(['placeholder'=>Yii::t('common','Nationality')])
                ->label(Yii::t('common','Nationality') ,['class'=>'label-control']);
            ?>
        </div>
    </div>

    <?php
    echo $form->field($model->getModel('profile') ,'communtication_channel')->dropDownList(\common\models\UserProfile::ListCommunicateChannels() ,
        ['prompt'=>Yii::t('common','Select')])
        ->label(Yii::t('frontend','Best way to commuincation?') ,['class'=>'label-control']);
    ?>

    <div class="form-group">
        <label for="" id="" class="label-control"><?= Yii::t('frontend', 'What are you interested in?'); ?> </label>
        <div class="form-check-group">

            <div class="form-check">
                <?php
                echo $form->field($model->getModel('profile') ,'interested_in_university')->checkbox();
                ?>
            </div>
            <div class="form-check">
                <?php  echo $form->field($model->getModel('profile') ,'interested_in_schools')->checkbox(); ?>

            </div>
        </div>
    </div>


    <h2 class="title title-sm"><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

    <?php // echo $form->field($model->getModel('account'), 'email') ?>
    <div class="row">
        <div class="col-sm-6">
             <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'button button-wide button-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
