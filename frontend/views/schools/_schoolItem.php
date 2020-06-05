<?php
use backend\models\SchoolCourse;
//echo $university->title .' - '. $university->id;
?>



<div class="item">

    <header class="item-header">
        <figure>
            <a href="/university/<?= $school->slug?>">
            <img src="<?= $school->logoImage?>" alt="<?= $school->title ?>" height="193px" width="310px">
            </a>
        </figure>
        <div class="item-content">
            <div class="item-name">
                <a href="/university/<?= $school->slug?>">  <span><?= $school->title ?></span></a>
                <div class="rating">
                    <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $school->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                    <span class="text-muted">(<?= $school->no_of_ratings?:1 ?>)</span>
                </div>
            </div>
            <div class="item-location"><img src="<?=  $school->country->flag ?>" width="16px" height="12px" alt="">
                <?= $school->country->title .' - '.$school->state->title .' - '. $school->city->title  ?>
            </div>
            <div class="item-body">
                <?= $school->details ; ?>
            </div>
        </div>
    </header>

    <?php
    if($school->schoolLatestCoursesList){
        foreach ($school->schoolLatestCoursesList as $item) {
            ?>
            <footer class="item-footer">
                <div>

                    <div class="item-label"><?= Yii::t('frontend','Course Name') ?></div>
                    <div><?= $item->title ?></div>
                    <div><small> <?=  SchoolCourse::ListLevels()[$item->required_level] ?></small></div>
                </div>
                <div>
                    <div class="item-label"><?= Yii::t('frontend','Start Date') ?></div>
                    <div><?= $item->first_submission_date ?></div>
                </div>
                <div>
                    <div class="item-label"><?= Yii::t('frontend','Annual Cost') ?></div>
                    <div ><span class="original-price"><?= $item->annual_cost ?></span>
                        <span class="currency"><?= $school->currency->currency_code ?></span>
                    </div>
                    <?php
                    echo \common\helpers\MyCurrencySwitcher::checkCurrency($school->currency->currency_code ,$item->annual_cost );
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
