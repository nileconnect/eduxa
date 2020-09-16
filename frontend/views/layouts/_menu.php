<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-brand logo"><h1><a href="/"><img src="/img/logo.svg" alt="eduxa"></a></h1></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item <?php if(Yii::$app->controller->id == 'universities') echo 'active';?>">
                <a class="nav-link" href="/universities"><?= Yii::t('frontend','Universities') ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if(Yii::$app->controller->id == 'schools') echo 'active';?> ">
                <a class="nav-link" href="/schools"><?= Yii::t('frontend','Language Schools') ?></a>
            </li>
            <li class="nav-item <?php if(Yii::$app->controller->id == 'pages' && Yii::$app->controller->action->id == 'about' ) echo 'active';?> ">
                <a class="nav-link" href="/about"><?= Yii::t('frontend','About Eduxa') ?></a>
            </li>

          <?php
          if(Yii::$app->user->isGuest){?>
              <li class="nav-item <?php if(Yii::$app->controller->id == 'user/sign-in'  && Yii::$app->controller->action->id == 'referral-signup') echo 'active';?>">
                  <a class="button button-primary" href="/referral-signup"><?= Yii::t('frontend','Referral Program') ?></a>
              </li>

            <li class="nav-item <?php if(Yii::$app->controller->id == 'user/sign-in'  && Yii::$app->controller->action->id == 'login') echo 'active';?> ">
                <a class="button button-primary" href="/login"><?= Yii::t('frontend','My Eduxa') ?></a>
            </li>

            <? }else{

              if ( Yii::$app->user->can(\common\models\User::ROLE_USER) ){
                ?>
               <li class="nav-item <?php if(Yii::$app->controller->id == 'dashboard' && Yii::$app->controller->action->id == 'index') echo 'active';?> ">
                   <a class="button button-primary" href="/dashboard"><?= Yii::t('frontend','My Eduxa') ?></a> </li>
                   <li class="nav-item">
                   <a class="button button-primary" href="/logout"><?= Yii::t('frontend','Log Out') ?></a> </li>
               <?php
               }else{
                ?>
                  <li class="nav-item <?php if(Yii::$app->controller->id == 'referral-dashboard' && Yii::$app->controller->action->id == 'index' ) echo 'active';?> ">
                      <a class="button button-primary" href="/referral-dashboard">
                          <?= Yii::t('frontend','Referral Program') ?>
                      </a>
                  </li>
                  <li class="nav-item">
                   <a class="button button-primary" href="/logout"><?= Yii::t('frontend','Log Out') ?></a> </li>
                  <?php
              }
          }?>


        </ul>
    </div>
</nav>
