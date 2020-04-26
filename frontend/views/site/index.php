<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>

<section class="slider">
    <ul class="flaoted-socials">
        <li><a href="#"><i class="fas fa-phone"></i></a></li>
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href=""><i class="fas fa-share-alt"></i></a></li>
    </ul>
    <div class="slides" data-slider="slick" data-slick='{"autoplay":true, "autoplaySpeed":3000, "fade":true, "arrows":false, "dots":true}'>
        <div class="slide slide--1" style="background-image:url('/img/slider/1.jpg')">
            <div class="container">
                <div class="slide-content">
                    <h1 class="bigger-text shadow-sm">
                        <?php echo Yii::t('frontend','Site Frontend');?>

                        Looking for the best <br>Education experience</h1>
                    <h4 class="big-text mtmd shadow-sm">Check out our Exclusive offers</h4>

                    <div class="mtmd">
                        <a href="#" class="button button-white button-wide text-large">Universities Offers</a>
                        <a href="#" class="button button-white button-wide text-large">Language Schools Offers</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide slide--2" style="background-image:url('/img/slider/2.jpg')">
            <div class="container">
                <div class="slide-content">
                    <h1 class="bigger-text shadow-sm">Looking for the best <br>Education experience</h1>
                    <h4 class="big-text mtmd shadow-sm">Check out our Exclusive offers</h4>

                    <div class="mtmd">
                        <a href="#" class="button button-white button-wide text-large">Universities Offers</a>
                        <a href="#" class="button button-white button-wide text-large">Language Schools Offers</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide slide--3" style="background-image:url('/img/slider/3.jpg')">
            <div class="container">
                <div class="slide-content">
                    <h1 class="bigger-text shadow-sm">Looking for the best <br>Education experience</h1>
                    <h4 class="big-text mtmd shadow-sm">Check out our Exclusive offers</h4>

                    <div class="mtmd">
                        <a href="#" class="button button-white button-wide text-large">Universities Offers</a>
                        <a href="#" class="button button-white button-wide text-large">Language Schools Offers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
