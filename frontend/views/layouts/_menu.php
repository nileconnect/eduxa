<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-brand logo"><h1><a href="/"><img src="img/logo.svg" alt="eduxa"></a></h1></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Universities <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Language Schools</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>

          <?php
          if(Yii::$app->user->isGuest){?>
            <li class="nav-item">
                <a class="button button-primary" href="/login">My Eduxa</a>
            </li>
            <li class="nav-item">
                <a class="button button-primary" href="#">Referral Program</a>
            </li>
            <? }else{
              ?>
              <li class="nav-item">
                  <a class="button button-primary" href="/dashboard">My Eduxa</a>
              </li>
              <?
          }?>


        </ul>
    </div>
</nav>
