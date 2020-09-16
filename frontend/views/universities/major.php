<section class="section">
    <div class="container">

        <h1 class="title"><?php echo $universityObj->title ?>:<?php echo $major->title  ?></h1>


        <div class="mtxlg">
            <div class="tab-pills">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabUndergraduate" role="tabpanel" aria-labelledby="undergraduate-tab">
                        <div class="universities universities-row">
                            <?php
                            if($programs){
                                foreach ($programs as $lastProg) {
                                    ?>
                                    <div class="item">

                                        <footer class="item-footer">
                                            <div>
                                                <div class="item-label"><?= Yii::t('frontend','Program Name') ?></div>
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
                                                    <span class="currency"><?= $universityObj->currency->currency_code ?></span>
                                                </div>
                                                <?php
                                                echo \common\helpers\MyCurrencySwitcher::checkCurrency($universityObj->currency->currency_code ,$lastProg->annual_cost );
                                                ?>
                                            </div>
                                            <div>
                                                <a href="/university/program/<?= $lastProg->slug ;?>" class="button btn-block button-primary"><?= Yii::t('frontend','Additional Info') ?></a>
                                            </div>
                                        </footer>

                                    </div>
                                    <?
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>