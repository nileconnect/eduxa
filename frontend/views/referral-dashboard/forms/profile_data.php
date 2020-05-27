<?php
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use common\models\User;
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

    <h2><?php echo Yii::t('frontend', 'Profile settings') ?></h2>

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

            <?php echo $form->field($model->getModel('profile'), 'telephone_no')->textInput(['placeholder'=>Yii::t('common','Telephone Number')])
                ->label(Yii::t('common','Telephone Number') ,['class'=>'label-control']);
            ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model->getModel('profile'), 'country_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Country::find()->where(['status'=>1])->orderBy('id')->asArray()->all(), 'id', 'title'),
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
            echo $form->field($model->getModel('profile'), 'state_id')->widget(DepDrop::classname(), [
                'data' =>$model->getModel('profile')->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\State::find()->where(['country_id'=>$model->getModel('profile')->country_id])->asArray()->all(), 'id', 'title') : [],
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
            echo $form->field($model->getModel('profile'), 'city_id')->widget(DepDrop::classname(), [
                'data' =>$model->getModel('profile')->country_id ?  \yii\helpers\ArrayHelper::map(\backend\models\Cities::find()->where(['state_id'=>$model->getModel('profile')->city_id])->asArray()->all(), 'id', 'title') : [],
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
        <?php
        if(User::IsRole($model->getModel('profile')->user_id , User::ROLE_REFERRAL_COMPANY)){
            ?>
            <div class="col-sm-6">
                <?php echo $form->field($model->getModel('profile'), 'job_title')->textInput(['placeholder'=>Yii::t('common','Job Title')])
                    ->label(Yii::t('common','Job Title') ,['class'=>'label-control']); ?>
            </div>
            <div class="col-sm-6">
                <?php echo $form->field($model->getModel('profile'), 'company_name')->textInput(['placeholder'=>Yii::t('common','Company Name')])
                    ->label(Yii::t('common','Company Name') ,['class'=>'label-control']); ?>
            </div>
            <?
        }
        ?>
        <div class="col-sm-12">
            <?php echo $form->field($model->getModel('profile'), 'expected_no_of_students')->textInput(['placeholder'=>Yii::t('common','Expected No. Of Students To Apply For By Eduxa')])
                ->label(Yii::t('frontend','Expected No. Of Students To Apply For By Eduxa') ,['class'=>'label-control']);
            ?>

        </div>
    </div>



    <h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

    <div class="row">
        <div class="col-sm-6">
             <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
