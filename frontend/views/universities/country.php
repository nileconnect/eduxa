
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
                            <a href="/universities/country/<?= $country->code?>">
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

    <div class="clear"><br/><br/></div>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="text-primary"><?= Yii::t('frontend' , 'Why study in')?> <?= $countryObj->title ?>
                    <?php if(isset($_SESSION['_language']) and $_SESSION['_language'] == 'ar'):?>
                        ؟
                    <?php else:?>
                        ?
                    <?php endif;?>
                    </h1>
                    <div class="mtlg">
                        <?= $countryObj->details ?>
                    </div>
                </div>
                <div class="ml-auto col-sm-5">
                    <figure><img src="<?= $countryObj->flag ?>" width="570px" height="450px" alt="" class="img-responsive"></figure>
                </div>
            </div>
        </div>
    </section>

    <section class="section  mtlg">
        <div class="container">
            <h1 class="title text-center"><?= Yii::t('frontend' , 'Recommended options by our advisors')?></h1>

            <div class="universities universities-column" data-slider="slick" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "responsive": [{"breakpoint": 768, "settings": { "slidesToShow": 1 }}, {"breakpoint": 480,"settings": {"slidesToShow": 1} }]}'>
                <?php
                if($universities){
                    foreach ($universities as $university) {
                        ?>
                        <div class="item">
                            <header class="item-header">
                                <figure>
                                    <img src="<?= $university->logoImage?>" alt="<?= $university->title ?>" height="193px" width="310px">
                                </figure>
                                <div class="item-content">
                                    <div class="item-name">
                                        <span><?= $university->title ?></span>
                                    </div>
                                    <div class="item-location">
                                        <img src="<?=  $university->country->flag ?>" width="16px" height="12px" alt="">
                                        <?= $university->country->title .' - '.$university->state->title .' - '. $university->city->title  ?>
                                    </div>
                                    <div class="item-body">
                                        <?= substr($university->description,0,250).'..' ; ?>
                                    </div>
                                    <div class="mtmd"><a href="/university/<?= $university->slug?>"><?= Yii::t('frontend' , 'Read More')?> <i class="fas fa-angle-double-right"></i></a></div>
                                </div>
                            </header>
                        </div>
                        <?
                    }
                }
                ?>

            </div>

            <div class="mtxlg text-center">
                <a href="/universities" class="button button-primary button-wide"><?= Yii::t('frontend' , 'All Universities')?></a>
            </div>
        </div>
    </section>
