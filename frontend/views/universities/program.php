<?php

$this->title =  $universityObj->title ." : " .$programObj->title ;
?>
<style>
.nav-pills .nav-item .nav-link{
    border-top: 4px solid #EEEEEE;
    border-bottom:0;
}
.nav-pills {
    border-bottom: 0;
    border-top: 4px solid #EEEEEE;
}
.nav-pills .nav-item {
    position: relative;
    bottom: 0;
    top: -4px;
}
select option[data-default] {
  color: #888 !important;
}
.embed-responsive {
    position: relative;
    display: block;
    width: 100%;
    padding: 0;
    overflow: hidden;
}
</style>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><?= Yii::t('frontend','Home')?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/university/<?= $universityObj->slug?>"><?= $universityObj->title ?></a></li>
        </ol>
    </div>
</nav>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">

            <div class="topTabs">
                   
                    <div id="myTabContent" class="tab-content">
                        <div id="tabImages" role="tabpanel" aria-labelledby="images-tab" class="tab-pane fade active show">
                            
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                               


                                    <?php
                                    $firstslid= 'active';
                                    foreach ($universityObj->universityPhotos as $universityPhoto) {
                                        ?>
                                        <div class="carousel-item <?=$firstslid?>">
                                            <img class="d-block w-100" src="<?= $universityPhoto->base_url.$universityPhoto->path?>" alt="<?= $universityObj->title ?>">
                                        </div>
                                        <?
                                        $firstslid='';
                                    }
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            
                        </div>
                        <div id="tabVideos" role="tabpanel" aria-labelledby="videos-tab" class="tab-pane fade">
                            <div class="row" style="margin-top:20px">

                                
                            <div id="VideoCaro" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    
                                <?php
                                    if($universityObj->universityVideos){
                                        $firstslid= 'active';
                                        foreach ($universityObj->universityVideos as $universityVideo) {
                                            ?>
                                            
                                            <div class="carousel-item <?=$firstslid?>">
                                                <div class="embed-responsive-16by9 video-fluid">
                                                    <iframe width="445" height="300" src="https://www.youtube.com/embed/<?= MyYoutubeVideoID($universityVideo->base_url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                                
                                            </div>
                                            
                                            <?
                                             $firstslid='';
                                        }
                                    }
                                ?>



                                </div>
                                <a class="carousel-control-prev" href="#VideoCaro" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#VideoCaro" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>


                            




                                
                            </div>
                        </div>
                    </div>
                    <ul id="myTab" role="tablist" class="nav nav-pills">
                        <li class="nav-item">
                            <a id="images-tab" data-toggle="tab" href="#tabImages" role="tab" aria-controls="images" aria-selected="true" class="nav-link active"><?= Yii::t('frontend' , 'Images')?></a>
                        </li> 
                        <li class="nav-item">
                            <a id="videos-tab" data-toggle="tab" href="#tabVideos" role="tab" aria-controls="videos" aria-selected="false" class="nav-link"><?= Yii::t('frontend' , 'Videos')?></a>
                        </li>
                    </ul>
                </div>


               
            </div>
            <div class="col-sm-7">
                <h3 class="text-primary"><?= $universityObj->title ?>: <?= $programObj->title ?> <span>(<?= $programObj->degree->title ?>)</span></h3>
                <h5>
                    <div class="rating fr">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $universityObj->total_rating?:1 ?>, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(<?= $universityObj->no_of_ratings?:1 ?>)</span>
                    </div>
                    <div class="item-location text-muted"><img src="<?= $universityObj->country->flag ?>" alt="" width="16px" height="12px">
                        <?= $universityObj->country->title .' - '.$universityObj->state->title .' - '. $universityObj->city->title  ?>
                    </div>
                </h5>
                <div class="mtlg">
                    <?= $universityObj->description ?>
                </div>
                <div class="mtxlg">
                    <a href="/program-apply/<?= $programObj->slug ?>" class="button button-wide button-primary"><?= Yii::t('frontend','Apply Now') ?></a>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="section">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black"><?= Yii::t('frontend','Program Requirements') ?></h2>
                <table class="table wide-cell text-large bg-white b-all shadow-sm">
                    <tbody>
                    <tr>
                        <td><?= Yii::t('frontend','Degree') ?></td>
                        <td><span class="text-primary"><?= $programObj->degree->title ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Program Name') ?></td>
                        <td><span class="text-primary"><?= $programObj->title ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','University') ?></td>
                        <td><span class="text-primary"><?= $universityObj->title ?></span></td>
                    </tr>

                    <?php
                    if($programObj->first_submission_date_active){
                        ?>
                        <tr>
                            <td><?= Yii::t('frontend','Application Start Date') ?></td>
                            <td>
                                <div><span class="text-primary">
                                        <?php

                                        echo Yii::$app->language == 'ar' ?\common\helpers\TimeHelper::arabicDate($programObj->first_submission_date) : $programObj->first_submission_date;
                                        ?>
                                    </span></div>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                    <?php
                    if($programObj->last_submission_date){
                        ?>
                        <tr>
                            <td><?= Yii::t('frontend','Application Deadline') ?></td>
                            <td>
                                <div><span class="text-primary">
                                        <?php

                                      echo   Yii::$app->language == 'ar' ?\common\helpers\TimeHelper::arabicDate($programObj->last_submission_date) :$programObj->last_submission_date

                                        ?>
                                    </span></div>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                   <?php
                   echo $this->render('_programstartdates', ['programStartDates' => $programStartDates]);

                   ?>



                    <tr>
                        <td><?= Yii::t('frontend','Study Method') ?></td>
                        <td><span class="text-primary"><?= $programObj->methodOfStudy->title?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Program Format') ?></td>
                        <td><span class="text-primary"><?= $programObj->formatOfProg->title?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Annual cost') ?></td>
                        <td><span class="text-primary"><?= $programObj->annual_cost?> <span><?= $universityObj->currency->currency_code?></span></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Conditional Admission') ?></td>
                        <td><span class="text-primary"><?= $programObj->conditionalAdm->title ?></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black">&nbsp;</h2>
                <table class="table bg-white b-all shadow-sm">
                    <tr>
                        <td><?= Yii::t('frontend','Study Duration') ?></td>
                        <td><span class="text-primary"><?= $programObj->study_duration_no ?> </span><span><?= \backend\models\University::listPeriods()[$programObj->study_duration] ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Study Language') ?></td>
                        <td><span class="text-primary"><?= $programObj->studyLang->title ; ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','TOEFL') ?></td>
                        <td><span class="text-primary"><?=  $programObj->toefl?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','IELTS') ?></td>
                        <td><span class="text-primary"><?=  $programObj->progIelts->title ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Bank Certificate') ?></td>
                        <td><span class="text-primary"><?= $programObj->bank_statment?>  <?= $universityObj->currency->currency_code ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','High School Transcript') ?></td>
                        <td><span class="text-primary"><?= $programObj->high_school_transcript ?></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Bachelor Degree Certificate') ?></td>
                        <td><span class="text-primary"><?= $programObj->bachelor_degree ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Note 1') ?></td>
                        <td><span class="text-primary"><?= $programObj->note1 ?></span></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t('frontend','Note 2') ?></td>
                        <td><span class="text-primary"><?= $programObj->note1 ?> </span></td>
                    </tr>
                </table>

                <div class="mtlg">
                    <a href="/program-apply/<?= $programObj->slug ?>" class="button btn-block button-wide button-primary text-large"><?= Yii::t('frontend','Apply Now') ?></a>
                </div>
            </div>
        </div>


    </div>
</section>
<?php

if($programsInSameMajor){
?>
<section class="section  mtlg">
    <div class="container">
        <h1 class="title text-center"><?= Yii::t('frontend','Similar Programs') ?></h1>

        <div class="universities universities-row">
            <?php
                foreach ($programsInSameMajor as $prog) {
                    $university = $prog->university ;
                    echo $this->render('_universityWithOneProg', ['university' => $university ,'lastProg'=>$prog]);
                }

            ?>


        </div>

    </div>
</section>
<?php } ?>