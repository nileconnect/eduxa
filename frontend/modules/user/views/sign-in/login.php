<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
@media (max-width: 768px) {
    .loginBtn{
        width:100%
    }
    form{
        width: 100%;
    }
    .fr{
        float:right
    }
}
</style>
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
                <div class="col-md-9">
                    <h2 class="title"><?= Yii::t('common','Sign in') ?></h2>

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="form-group">
                            <div>
                                <span><i class="far fa-envelope"></i></span>
                                <?php echo $form->field($model, 'identity')->textInput(['placeholder'=>Yii::t('common','write your email address')])
                                ->label(Yii::t('common','E-Mail Address') ,['class'=>'label-control']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <span><i class="fas fa-unlock-alt"></i></span>
                                <?php echo $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('common','****************')])
                                ->label(Yii::t('common','Password') ,['class'=>'label-control']);?>
                            </div>
                        </div>
                        <div class="form-group">
                            
                                <div class="form-check " style="    display: inline-block;margin-top:0 !important">
                                    <?php echo $form->field($model, 'rememberMe')->checkbox() ?>

                                </div>
                            
                                <a href="/reset-password" class="fr" ><?= Yii::t('common','Forget password?') ?></a>
                           
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-primary button-wide text-large loginBtn"><?= Yii::t('common','Login') ?></button>
                        </div>
                        <div class="form-group mtmd">
                            <div class="text-large"><?= Yii::t('common','Don’t have an account?') ?> <a href="/signup"><?= Yii::t('common','Sign up') ?></a></div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>