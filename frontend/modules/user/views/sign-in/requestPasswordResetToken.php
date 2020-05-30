<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

$this->title =  Yii::t('frontend', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1></h1>

    <div class="row">
        <div class="col-lg-5">
           
        </div>
    </div>
</div>
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
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                    <div class="form-group">
                        <?php echo $form->field($model, 'email') ?>
                    </div>
               
                    <div class="form-group mtxlg">
                        <button type="submit" class="button button-primary button-wide text-large"><?= Yii::t('common','Login') ?></button>
                    </div>
                    <?php ActiveForm::end(); ?>
                       
                        
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>