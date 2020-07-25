<div class="item">
    <header class="item-header">
        <figure>
            <!--                                <span class="cut-off">15%</span>-->
            <a href="/university/<?= $university->slug?>">
                <img src="<?= $university->logoImage?>" alt="<?= $university->title ?>" height="193px" width="310px">
            </a>
        </figure>
        <div class="item-content">
            <div class="item-name">
                <a href="/university/<?= $university->slug?>"><span> <?= $university->title ?></span></a>
                <div class="rating">
                    <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $university->total_rating?:1; ?>, "readOnly":true, "starSize":19}'></div>
                    <span class="text-muted">(<?= $university->no_of_ratings?:1; ?>)</span>
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
    if($lastProg){
        ?>
        <footer class="item-footer">
            <div>
                <div class="item-label"><?= Yii::t('frontend','Programm Name') ?></div>
                <div><?= $lastProg->title ?></div>
                <!-- <div><small> Degree: <?= $lastProg->degree->title ?></small></div> -->
                <div><small><?= $lastProg->degree->title ?>: <?= $lastProg->study_duration_no ?>
                        <?= \backend\models\University::listPeriods()[$lastProg->study_duration] ?></small></div>
            </div>
            <div>
                <div class="item-label"><?= Yii::t('frontend','Start Date') ?></div>
                <div><?php
                  echo  Yii::$app->language=='ar' ?  \common\helpers\TimeHelper::arabicDate($lastProg->first_submission_date)  : date('d F Y', strtotime($lastProg->first_submission_date)) ;
                     ?></div>
            </div>
            <div>
                <div class="item-label"><?= Yii::t('frontend','Annual Cost') ?></div>
                <div >
                    <span class="original-price"><?= $lastProg->annual_cost ?></span>
                    <span class="currency"><?= $university->currency->currency_code ?></span>
                </div>
                <?php
                echo \common\helpers\MyCurrencySwitcher::checkCurrency($university->currency->currency_code ,$lastProg->annual_cost );
                ?>
            </div>
            <div>
                <a href="/university/program/<?= $lastProg->slug ;?>" class="button btn-block button-primary"><?= Yii::t('frontend','Additional Info') ?></a>
            </div>
        </footer>
        <?
    }
    ?>

</div>