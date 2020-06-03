<?php
use backend\models\SchoolCourse;
?>
<div class="item">
    <header class="item-header">
        <figure>
            <!--                                <span class="cut-off">15%</span>-->
            <a href="/school/<?= $school->slug?>">
                <img src="<?= $school->logoImage?>" alt="<?= $school->title ?>" height="193px" width="310px">
            </a>
        </figure>
        <div class="item-content">
            <div class="item-name">
                <a href="/school/<?= $school->slug?>"><span> <?= $school->title ?></span></a>
                <div class="rating">
                    <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $school->total_rating?:1; ?>, "readOnly":true, "starSize":19}'></div>
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
    if($lastCourse){
        ?>
        <footer class="item-footer">
            <div>
                <div class="item-label"><?= Yii::t('frontend','Course Name') ?></div>
                <div><?= $lastCourse->title ?></div>
                <div><small> <?=  SchoolCourse::ListLevels()[$lastCourse->required_level] ?></small></div>
            </div>

            <div>
                <div class="item-label">Lessons/week</div>
                <div><?= $lastCourse->lessons_per_week ?></div>
            </div>
            <div>
                <div class="item-label">Study Time</div>
                <div><?= SchoolCourse::ListCourseTime()[$lastCourse->time_of_course] ?></div>
            </div>

             <div>
                <div class="item-label"><?= Yii::t('frontend','Best price') ?></div>
                <div ><span class="original-price"><?= $lastCourse->minimumPrice ?></span>
                    <span class="currency"><?= $school->currency->currency_code ?></span>
                </div>
            </div>
            <div>
                <a href="/school/program/<?= $lastCourse->slug ;?>" class="button btn-block button-primary"><?= Yii::t('frontend','Additional Info') ?></a>
            </div>
        </footer>
        <?
    }
    ?>

</div>