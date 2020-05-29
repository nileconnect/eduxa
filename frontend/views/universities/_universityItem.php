<?php

//echo $university->title .' - '. $university->id;
?>



<div class="item">

    <header class="item-header">
        <figure>
            <img src="<?= $university->logoImage?>" alt="<?= $university->title ?>" height="193px" width="310px">
        </figure>
        <div class="item-content">
            <div class="item-name">
                <span><?= $university->title ?></span>
                <div class="rating">
                    <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $university->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                    <span class="text-muted">(<?= $university->no_of_ratings?:1 ?>)</span>
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
    <footer class="item-footer">
        <div>
            <div class="item-label">Programm Name</div>
            <div>Aerospace Engineering</div>
            <div><small>Master: 2 Years</small></div>
        </div>
        <div>
            <div class="item-label">Start Date</div>
            <div>30 Jane 2018</div>
        </div>
        <div>
            <div class="item-label">Annual Cost</div>
            <div ><span class="original-price">25,700,00</span> <span class="currency">USD</span></div>
            <div ><span class="converted-price">50,650,00</span> <span class="currency">LE</span></div>
        </div>
        <div>
            <a href="#" class="button btn-block button-primary">Additional Info</a>
        </div>
    </footer>
    <footer class="item-footer">
        <div>
            <div class="item-label">Programm Name</div>
            <div>Aerospace Engineering</div>
            <div><small>Master: 2 Years</small></div>
        </div>
        <div>
            <div class="item-label">Start Date</div>
            <div>30 Jane 2018</div>
        </div>
        <div>
            <div class="item-label">Annual Cost</div>
            <div ><span class="original-price">25,700,00</span> <span class="currency">USD</span></div>
            <div ><span class="converted-price">50,650,00</span> <span class="currency">LE</span></div>
        </div>
        <div>
            <a href="#" class="button btn-block button-primary">Additional Info</a>
        </div>
    </footer>
    <footer class="item-footer">
        <div>
            <div class="item-label">Programm Name</div>
            <div>Aerospace Engineering</div>
            <div><small>Master: 2 Years</small></div>
        </div>
        <div>
            <div class="item-label">Start Date</div>
            <div>30 Jane 2018</div>
        </div>
        <div>
            <div class="item-label">Annual Cost</div>
            <div ><span class="original-price">25,700,00</span> <span class="currency">USD</span></div>
            <div ><span class="converted-price">50,650,00</span> <span class="currency">LE</span></div>
        </div>
        <div>
            <a href="#" class="button btn-block button-primary">Additional Info</a>
        </div>
    </footer>
</div>
