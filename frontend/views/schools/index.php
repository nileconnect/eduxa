
<div class="jumbotron jumbotron-img" >
    <div class="img-layer" style="background-image: url('/img/banners/banner1.jpg');"></div>
</div>


<?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
if($countries){
    ?>
    <section class="section top-destinations">
        <div class="container">
            <h1 class="title text-center"><?= Yii::t('frontend','Top Destinations') ?></h1>

            <div class="mtlg">
                <ul data-slider="slick" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "responsive": [{"breakpoint": 768, "settings": { "slidesToShow": 1 }}, {"breakpoint": 480,"settings": {"slidesToShow": 1} }]}'>
                    <?php
                    foreach ($countries as $country) {
                        ?>

                        <li>
                            <figure>
                                <a href="/school/country/<?= $country->code?>">
                                    <img src="<?= $country->flag ?>" alt="<?= $country->title ?>" width="270px" height="270px" />
                                    <figcaption>
                                        <span class="country-name"><?= $country->title ?></span>
                                    </figcaption>
                                </a>
                            </figure>
                        </li>
                        <?
                    }
                    ?>

                </ul>
            </div>
        </div>
    </section>
<?php } ?>

<section class="section  mtlg">
    <div class="container">
        <h1 class="title text-center"><?= Yii::t('frontend','Recommended options by our advisors') ?></h1>

        <div class="universities universities-row">
            <?php
            if($schools){
                foreach ($schools as $school) {
                    $lastCourse = $school->schoolLatestCourse;
                    echo $this->render('_schoolWithOneCourse', ['school' => $school ,'lastCourse'=>$lastCourse]);
                }
            }
            ?>
        </div>

    </div>
</section>