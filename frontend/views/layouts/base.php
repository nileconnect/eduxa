<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <!-- Add your site or application content here -->
    <header class="header">
        <div class="header-strip">
            <div class="container">
                <div class="header-strip-content">
                    <ul class="head-info unstyled">
                        <li><a href="mailto:info@eduxa.com"><small class="mrxs"><i class="far fa-envelope"></i></small> <span class="link-text">info@eduxa.com</span></a></li>
                        <li><a href="tel:+966-xxx-xxx-xxx"><small class="mrxs"><i class="fas fa-phone"></i></small> <span class="link-text">+966-xxx-xxx-xxx</span></a></li>
                    </ul>
                    <ul class="head-lang unstyled">
                        <li class="head-currency-item dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">EGP</a>
                                <a class="dropdown-item" href="#">USD</a>
                            </div>
                        </li>
                        <li class="head-lang-item dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/icons/eng-flag.svg" alt="" /> <span class="link-text">English</span></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Arabic</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container">

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
                            <li class="nav-item">
                                <a class="button button-primary" href="/login">My Eduxa</a>
                            </li>
                            <li class="nav-item">
                                <a class="button button-primary" href="#">Referral Program</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>



    <?php echo $content ?>



<?php $this->endContent() ?>