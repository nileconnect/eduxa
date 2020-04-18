<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php')
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
                        <div class="logo"><h1><a href="index.html"><img src="img/logo-white.svg" alt="eduxa"></a></h1></div>
                        <p>
                            I was always somebody who felt quite sorry for myself, what I had not got compared to my friends, how much of a struggle my life seemed to be compared to others. I was caught up in a web of negativity
                        </p>
                        <ul class="socials">
                            <li><a class="so_facebook" href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="so_twiiter" href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a class="so_instegram" href=""><i class="fab fa-instagram"></i></a></li>
                            <li><a class="so_linkedin" href=""><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-6 mtmd">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="">Universities</a></li>
                                    <li><a href="">Language Schools</a></li>
                                    <li><a href="">How We Work</a></li>
                                    <li><a href="">About Us</a></li>
                                </ul>
                            </div>
                            <div class="col-6 mtmd">
                                <h3>Resources</h3>
                                <ul>
                                    <li><a href="">Contact</a></li>
                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">Terms & Policy</a></li>
                                    <li><a href="">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mtmd">
                        <h3>Newsletter</h3>
                        <form action="" method="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter your e-mail address">
                                <button type="submit"><i class="far fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">© Copyrights 2019. All rights reserved</div>
        </div>
    </footer>

<?php $this->endContent() ?>