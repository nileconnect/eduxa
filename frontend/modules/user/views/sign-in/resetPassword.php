<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\ResetPasswordForm */

$this->title = Yii::t('frontend', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="auth-content">
    <div class="auth-info" style="background-image: url('/img/auth.jpg');">
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
                    <h2 class="title"><?php echo Html::encode($this->title) ?></h2>
                    <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
                    <div class="form-group">
                        <?php echo $form->field($model, 'password')->passwordInput() ?>
                    </div>
               
                    <div class="form-group mtxlg">
                        <button type="submit" class="button button-primary button-wide text-large"><?= Yii::t('common','Submit') ?></button>
                    </div>
                    <?php ActiveForm::end(); ?>
                       
                        
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
