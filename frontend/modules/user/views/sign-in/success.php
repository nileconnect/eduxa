<div class="successMsg <?php if(Yii::$app->session->hasFlash('alert-create-account-referral-successfully')) echo 'show'; ?>">
    <img src="/img/success.png">
    <h3><?=  Yii::t('frontend','Congratulations') ?>,</h3>
    <p><?= Yii::t('frontend','Your Account Successfully Created, and we will be verified your account by our team.')?></p>
    <a class="button button-primary" href="/login"><?= Yii::t('frontend','Home')?></a>
</div>