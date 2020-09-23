<?php

//echo $program->university->title .' - '. $program->university->id;
?>

<?php
if($program->university->universityPrograms ){
    ?>


    <div class="item">

        <header class="item-header">
            <figure>
                <a href="/university/<?= $program->university->slug?>">
                    <img src="<?= $program->university->logoImage?>" alt="<?= $program->university->title ?>" height="193px" width="310px">
                </a>
            </figure>
            <div class="item-content">
                <div class="item-name">
                    <a href="/university/<?= $program->university->slug?>">  <span><?= $program->university->title ?> - <?= $program->title ?> </span></a>
                    <div class="rating">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $program->university->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(<?= $program->university->no_of_ratings?:1 ?>)</span>
                    </div>
                </div>
                <div class="item-location"><img src="<?=  $program->university->country->flag ?>" width="16px" height="12px" alt="">
                    <?= $program->university->country->title .' - '.$program->university->state->title .' - '. $program->university->city->title  ?>
                </div>
                <div class="item-body hideMob">
                    <?= substr($program->university->description ,0,350) ; ?>
                    <?php
                    if(strlen($program->university->description) > 350 ){
                        echo  "<a href='/university/$program->university->slug'> ".Yii::t('frontend','.. more info')."</a>";
                    }

                    ?>

                </div>
            </div>
        </header>
        <footer class="item-footer">
            <div>
                <div class="item-label"><?= Yii::t('frontend','Program Name') ?></div>
                <div><?= $program->title ?></div>
                <div><small><?= $program->degree->title ?>: <?= $program->study_duration_no ?> <?= \backend\models\University::listPeriods()[$program->study_duration] ?></small></div>
            </div>
            <div>
                <div class="item-label"><?= Yii::t('frontend','Start Date') ?></div>
                <div><?= date('d-M-Y', strtotime($program->first_submission_date)) ?></div>
            </div>
            <div>
                <div class="item-label"><?= Yii::t('frontend','Annual Cost') ?></div>
                <div ><span class="original-price"><?= $program->annual_cost ?></span>
                    <span class="currency"><?= $program->university->currency->currency_code ?></span>
                </div>
                <?php
                echo \common\helpers\MyCurrencySwitcher::checkCurrency($program->university->currency->currency_code ,$program->annual_cost );
                ?>
            </div>
            <div>
                <a href="/university/program/<?= $program->slug ;?>" class="button btn-block button-primary"><?= Yii::t('frontend','Additional Info') ?></a>
            </div>
        </footer>
    </div>

    <?php
}
?>
