<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-brand logo"><h1><a href="/"><img src="img/logo.svg" alt="eduxa"></a></h1></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><?= Yii::t('frontend','Universities') ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?= Yii::t('frontend','Language Schools') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?= Yii::t('frontend','About Us') ?></a>
            </li>

          <?php
          if(Yii::$app->user->isGuest){?>
            <li class="nav-item">
                <a class="button button-primary" href="/login"><?= Yii::t('frontend','My Eduxa') ?></a>
            </li>
            <li class="nav-item">
                <a class="button button-primary" href="/referral-signup"><?= Yii::t('frontend','Referral Program') ?></a>
            </li>
            <? }else{

              if ( Yii::$app->user->can(\common\models\User::ROLE_USER) ){
                ?>
               <li class="nav-item"> <a class="button button-primary" href="/dashboard"><?= Yii::t('frontend','My Eduxa') ?></a> </li>
               <?php
               }else{
                ?>
                  <li class="nav-item"> <a class="button button-primary" href="/referral-dashboard"><?= Yii::t('frontend','Referral Program') ?></a> </li>
                  <?php
              }
          }?>


        </ul>
    </div>
</nav>
