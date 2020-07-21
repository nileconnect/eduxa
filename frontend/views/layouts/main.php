<?php
/* @var $this \yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use backend\models\Newsletter;

/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php');

if(Yii::$app->session->hasFlash('alert')){
    echo \kartik\growl\Growl::widget([
        'type' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'type'), //Growl::TYPE_SUCCESS,// ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'type'), //
        'icon' => 'glyphicon glyphicon-ok-sign',
        //'title' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'title'),
        'showSeparator' => true,
        'body' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
        'showSeparator' => false,
        'pluginOptions' => [
            'showProgressbar' => false,
            'placement' => [
                'from' => 'bottom',
                'align' => 'center',
            ]
        ]
    ]);
}


?>

    <main class="content">
                    <?php echo $content ?>
    </main>
<?php // footer is here ?>

 <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-sm-4 mtmd">
                        <div class="logo"><h1><a href="/"><img src="/img/logo-white.svg" alt="eduxa"></a></h1></div>
                        <p>
                            I was always somebody who felt quite sorry for myself, what I had not got compared to my friends, how much of a struggle my life seemed to be compared to others. I was caught up in a web of negativity
                        </p>
                        <ul class="socials">
                            <?php
                            if(  Yii::$app->keyStorage->get('facebook') ) echo '<li><a class="so_facebook" href="'.Yii::$app->keyStorage->get('facebook').'"><i class="fab fa-facebook-f"></i></a></li>';
                            if(  Yii::$app->keyStorage->get('twitter') ) echo '<li><a class="so_twiiter" href="'.Yii::$app->keyStorage->get('twitter').'"><i class="fab fa-twitter"></i></a></li>';
                            if(  Yii::$app->keyStorage->get('instagram') ) echo '<li><a class="so_instegram" href="'.Yii::$app->keyStorage->get('instagram').'"><i class="fab fa-instagram"></i></a></li>';
                            if(  Yii::$app->keyStorage->get('linkedin') ) echo '<li><a class="so_linkedin" href="'.Yii::$app->keyStorage->get('linkedin').'"><i class="fab fa-linkedin-in"></i></a></li>';
                            ?>




                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-6 mtmd">
                                <h3><?= Yii::t('frontend', 'Quick Links'); ?></h3>
                                <ul>
                                    <li><a href="/universities"><?= Yii::t('frontend', 'Universities'); ?></a></li>
                                    <li><a href="/schools"><?= Yii::t('frontend', 'Language Schools'); ?></a></li>
                                    <li><a href="/how-we-work"><?= Yii::t('frontend', 'How We Work'); ?></a></li>
                                    <li><a href="/about"><?= Yii::t('frontend', 'About Us'); ?></a></li>
                                </ul>
                            </div>
                            <div class="col-6 mtmd">
                                <h3><?= Yii::t('frontend', 'Resources'); ?></h3>
                                <ul>
                                    <li><a href="/contact"><?= Yii::t('frontend', 'Contact'); ?></a></li>
                                    <li><a href="/terms"><?= Yii::t('frontend', 'Terms & Policy'); ?></a></li>
                                    <li><a href="/privacy"><?= Yii::t('frontend', 'Privacy'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mtmd">
                        <h3><?= Yii::t('frontend', 'Newsletter'); ?></h3>
                        <?php 
                            $form = ActiveForm::begin();
                            $model = new Newsletter();
                            if($model->load(Yii::$app->request->post()) and $model->save()){
                                echo "Saved";
                                $model = new Newsletter();
                            }
                        ?>
                            <div class="form-group">
                                <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => Yii::t('frontend', 'Enter your e-mail address')]) ?>
                                <button type="submit"><i class="far fa-paper-plane"></i></button>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright"><?= Yii::t('frontend', '© Copyrights'); ?> <?= date('Y')?><?= Yii::t('frontend', '. All rights reserved'); ?></div>
        </div>
    </footer>

<?php $this->endContent() ?>