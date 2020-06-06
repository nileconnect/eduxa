
    <div class="jumbotron jumbotron-img" >
        <div class="img-layer" style="background-image: url('/img/banners/banner1.jpg');"></div>
    </div>

    <div class="search-form after-jumbotron">
    <div class="container">
        <div class="text-white">
            <h2>Are you interested in studying in <?= $countryObj->title ?>?</h2>
            <h5>Find, Review and Apply to the best universities in the world</h5>
        </div>
    </div>
    </div>
    <div class="clear"><br/><br/></div>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="text-primary">Why study in <?= $countryObj->title ?>?</h1>
                    <div class="mtlg">
                        <?= $countryObj->details ?>
                    </div>
                </div>
                <div class="ml-auto col-sm-5">
                    <figure><img src="<?= $countryObj->flag ?>" width="570px" height="450px" alt="" class="/img-responsive"></figure>
                </div>
            </div>
        </div>
    </section>

    <section class="section  mtlg">
        <div class="container">
            <h1 class="title text-center">Recommended options by our advisors</h1>

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
                                        <?= substr($university->description,0,400) ; ?>
                                    </div>
                                    <div class="mtmd"><a href="/university/<?= $university->slug?>">Read More <i class="fas fa-angle-double-right"></i></a></div>
                                </div>
                            </header>
                        </div>
                        <?
                    }
                }
                ?>

            </div>

            <div class="mtxlg text-center">
                <a href="/universities" class="button button-primary button-wide">All Universities</a>
            </div>
        </div>
    </section>
