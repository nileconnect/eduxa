
<div class="jumbotron jumbotron-img" >
    <div class="img-layer" style="background-image: url('/img/banners/banner1.jpg');"></div>
</div>


<?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
if($countries){
?>
<section class="section top-destinations">
    <div class="container">
        <h1 class="title text-center">Top Destinations</h1>

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

<section class="section  mtlg">
    <div class="container">
        <h1 class="title text-center">Recommended options by our advisors</h1>

        <div class="universities universities-row">
            <?php
            if($universities){
                foreach ($universities as $university) {
                    ?>
                    <div class="item">
                        <header class="item-header">
                            <figure>
<!--                                <span class="cut-off">15%</span>-->
                                <img src="<?= $university->logoImage?>" alt="<?= $university->title ?>" height="193px" width="310px">
                            </figure>
                            <div class="item-content">
                                <div class="item-name">
                                    <span><?= $university->title ?></span>
                                    <div class="rating">
                                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $university->total_rating ?>, "readOnly":true, "starSize":19}'></div>
                                        <span class="text-muted">(<?= $university->no_of_ratings ?>)</span>
                                    </div>
                                </div>
                                <div class="item-location"><img src="<?=  $university->country->flag ?>" width="16px" height="12px" alt="">
                                    <?= $university->country->title .' - '.$university->state->title .' - '. $university->city->title  ?>
                                </div>
                                <div class="item-body">
                                    <?= $university->description ; ?>
                                </div>
                            </div>
                        </header>
                        <?php
                        $lastProg = $university->universityLatestProgram;
                        if($lastProg){
                            ?>
                            <footer class="item-footer">
                                <div>
                                    <div class="item-label">Programm Name</div>
                                    <div><?= $lastProg->title ?></div>
                                    <div><small><?= $lastProg->major->title ?>: <?= $lastProg->study_duration_no ?> <?= \backend\models\University::listPeriods()[$lastProg->study_duration] ?></small></div>
                                </div>
                                <div>
                                    <div class="item-label">Start Date</div>
                                    <div><?= $lastProg->first_submission_date ?></div>
                                </div>
                                <div>
                                    <div class="item-label">Annual Cost</div>
                                    <div ><span class="original-price"><?= $lastProg->annual_cost ?></span>
                                        <span class="currency"><?= $university->currency->currency_code ?></span>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="button btn-block button-primary">Additional Info</a>
                                </div>
                            </footer>
                            <?
                        }
                        ?>

                    </div>
                    <?
                }
            }
            ?>
        </div>

    </div>
</section>