<?php
use backend\models\SchoolCourse;

?>
<div class="item">

    <header class="item-header">
        <figure>
            <a href="/school/course/<?= $course->slug ;?>">
            <img src="<?= $course->school->logoImage?>" alt="<?= $course->school->title ?>" height="193px" width="310px">
            </a>
        </figure>
        <div class="item-content">
            <div class="item-name">
                <a href="/school/course/<?= $course->slug ;?>">  <span><?= $course->school->title ?> - <?= $course->title ?></span></a>
                <div class="rating">
                    <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $course->school->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                    <span class="text-muted">(<?= $course->school->no_of_ratings?:1 ?>)</span>
                </div>
            </div>
            <div class="item-location"><img src="<?=  $course->school->country->flag ?>" width="16px" height="12px" alt="">
                <?= $course->school->country->title .' - '.$course->school->state->title .' - '. $course->school->city->title  ?>
            </div>
            <div class="item-body">
                <?= $course->information ; ?>
            </div>
        </div>
    </header>
    <footer class="item-footer">
        <div>
            <div class="item-label">Lessons/week</div>
            <div><?= $course->lessons_per_week ?></div>
        </div>
        <div>
            <div class="item-label">Study Time</div>
            <div><?= SchoolCourse::ListCourseTime()[$course->time_of_course] ?></div>
        </div>

        <div>
            <div class="item-label"><?= Yii::t('frontend', 'Best price') ?></div>
            <div ><span class="original-price"><?= $min_price ?></span>
                <span class="currency"><?= $course->school->currency->currency_code ?></span>
            </div>

            <?php
            echo \common\helpers\MyCurrencySwitcher::checkCurrency($course->school->currency->currency_code, $min_price);
            ?>
        </div>
        <div>
            <a href="/school/course/<?= $course->slug ;?>" class="button btn-block button-primary"><?= Yii::t('frontend', 'Additional Info') ?></a>
        </div>
    </footer>
</div>
