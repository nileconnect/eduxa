<?php

//echo $university->title .' - '. $university->id;
?>

<?php
if($university->universityPrograms ){
    ?>


    <div class="item">

        <header class="item-header">
            <figure>
                <a href="/university/<?= $university->slug?>">
                    <img src="<?= $university->logoImage?>" alt="<?= $university->title ?>" height="193px" width="310px">
                </a>
            </figure>
            <div class="item-content">
                <div class="item-name">
                    <a href="/university/<?= $university->slug?>">  <span><?= $university->title ?></span></a>
                    <div class="rating">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $university->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(<?= $university->no_of_ratings?:1 ?>)</span>
                    </div>
                </div>
                <div class="item-location"><img src="<?=  $university->country->flag ?>" width="16px" height="12px" alt="">
                    <?= $university->country->title .' - '.$university->state->title .' - '. $university->city->title  ?>
                </div>
                <div class="item-body">
                    <?= substr($university->description ,0,350) ; ?>
                    <?php
                    if(strlen($university->description) > 350 ){
                        echo  "<a href='/university/$university->slug'> ".Yii::t('frontend','.. more info')."</a>";
                    }

                    ?>

                </div>
            </div>
        </header>

        <?php
        if($university->getUniversityLatestProgramsList(3,$_GET['UniversityProgramsSearch']['degree_id'])){
            foreach ($university->getUniversityLatestProgramsList(3,$_GET['UniversityProgramsSearch']['degree_id']) as $item) {
                ?>
                <footer class="item-footer">
                    <div>

                        <div class="item-label"><?= Yii::t('frontend','Program Name') ?></div>
                        <div><?= $item->title ?></div>
                        <div><small><?= $item->degree->title ?>: <?= $item->study_duration_no ?> <?= \backend\models\University::listPeriods()[$item->study_duration] ?></small></div>
                    </div>
                    <div>
                        <div class="item-label"><?= Yii::t('frontend','Start Date') ?></div>
                        <div><?= date('d-M-Y', strtotime($item->first_submission_date)) ?></div>
                    </div>
                    <div>
                        <div class="item-label"><?= Yii::t('frontend','Annual Cost') ?></div>
                        <div ><span class="original-price"><?= $item->annual_cost ?></span>
                            <span class="currency"><?= $university->currency->currency_code ?></span>
                        </div>
                        <?php
                        echo \common\helpers\MyCurrencySwitcher::checkCurrency($university->currency->currency_code ,$item->annual_cost );
                        ?>
                    </div>
                    <div>
                        <a href="/university/program/<?= $item->slug ;?>" class="button btn-block button-primary"><?= Yii::t('frontend','Additional Info') ?></a>
                    </div>
                </footer>
                <?
            }
        }
        ?>

    </div>

    <?php
}
?>
