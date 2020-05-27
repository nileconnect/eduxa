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
                        <li><a href="mailto:<?= Yii::$app->keyStorage->get('email')?>">
                                <small class="mrxs"><i class="far fa-envelope"></i></small> <span class="link-text">
                                    <?= Yii::$app->keyStorage->get('email')?></span></a>
                        </li>
                        <li><a href="tel:<?= Yii::$app->keyStorage->get('phone')?>"><small class="mrxs"><i class="fas fa-phone"></i></small> <span class="link-text"><?= Yii::$app->keyStorage->get('phone')?></span></a></li>
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
                            <?php echo \common\helpers\multiLang\myLanguageSelector::widget(['viewFile'=>'dropDown']);?>


<!--                            <a href="javascript:void(0);" class="dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/icons/eng-flag.svg" alt="" /> <span class="link-text">English</span></a>-->
<!--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">-->
<!--                                <a class="dropdown-item" href="#">English</a>-->
<!--                                <a class="dropdown-item" href="#">Arabic</a>-->
<!--                            </div>-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container">
               <?php
                       $this->beginContent('@frontend/views/layouts/_menu.php');
                       $this->endContent() ;
                   ?>
            </div>
        </div>
    </header>



    <?php echo $content ?>



<?php $this->endContent() ?>