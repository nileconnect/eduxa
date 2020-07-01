
<section class="slider">

    <?php
    $this->beginContent('@frontend/views/layouts/_shareWidget.php');
    $this->endContent() ;
    ?>
    <div class="slides" data-slider="slick" data-slick='{"autoplay":true, "autoplaySpeed":3000, "fade":true, "arrows":false, "dots":true}'>
        <div class="slide slide--1" style="background-image:url('/img/slider/1.jpg')">
            <div class="container">
                <div class="slide-content">
                    <h1 class="bigger-text shadow-sm"><?= Yii::t('frontend','Looking for the best') ?> <br><?= Yii::t('frontend','Education experience') ?></h1>
                    <h4 class="big-text mtmd shadow-sm"><?= Yii::t('frontend','Check out our Exclusive offers') ?></h4>

                    <div class="mtmd">
                        <a href="/universities" class="button button-white button-wide text-large"><?= Yii::t('frontend','Universities Offers') ?></a>
                        <a href="/schools" class="button button-white button-wide text-large"><?= Yii::t('frontend','Language Schools Offers') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide slide--2" style="background-image:url('/img/slider/2.jpg')">
        <div class="container">
                <div class="slide-content">
                    <h1 class="bigger-text shadow-sm"><?= Yii::t('frontend','Looking for the best') ?> <br><?= Yii::t('frontend','Education experience') ?></h1>
                    <h4 class="big-text mtmd shadow-sm"><?= Yii::t('frontend','Check out our Exclusive offers') ?></h4>

                    <div class="mtmd">
                        <a href="/universities" class="button button-white button-wide text-large"><?= Yii::t('frontend','Universities Offers') ?></a>
                        <a href="/schools" class="button button-white button-wide text-large"><?= Yii::t('frontend','Language Schools Offers') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide slide--3" style="background-image:url('/img/slider/3.jpg')">
        <div class="container">
                <div class="slide-content">
                    <h1 class="bigger-text shadow-sm"><?= Yii::t('frontend','Looking for the best') ?> <br><?= Yii::t('frontend','Education experience') ?></h1>
                    <h4 class="big-text mtmd shadow-sm"><?= Yii::t('frontend','Check out our Exclusive offers') ?></h4>

                    <div class="mtmd">
                        <a href="/universities" class="button button-white button-wide text-large"><?= Yii::t('frontend','Universities Offers') ?></a>
                        <a href="/schools" class="button button-white button-wide text-large"><?= Yii::t('frontend','Language Schools Offers') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
