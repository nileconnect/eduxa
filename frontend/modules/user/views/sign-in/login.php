<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
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
                    <h2 class="title">Sign in</h2>

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="form-group">
                            <?php echo $form->field($model, 'identity')->textInput(['placeholder'=>Yii::t('common','Email Address')])
                                ->label(Yii::t('common','Email Address') ,['class'=>'label-control']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo $form->field($model, 'password')->passwordInput()
                                ->label(Yii::t('common','Password') ,['class'=>'label-control']);?>
                        </div>
                        <div class="form-group">
                            <a href="/reset-password" class="fr">Forget your password?</a>
                            <div class="form-check">
                                <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
<!--                                <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>-->
                            </div>
                        </div>
                        <div class="form-group mtxlg">
                            <button type="submit" class="button button-primary button-wide text-large">Login</button>
                        </div>
                        <div class="form-group mtmd">
                            <div class="text-large">Don’t have an account? <a href="/signup">Create an Account Now!</a></div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>