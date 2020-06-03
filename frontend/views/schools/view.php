<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $firstslid= 'active';
                        foreach ($schoolObj->schoolPhotos as $schoolPhoto) {
                            ?>
                            <div class="carousel-item <?=$firstslid?>">
                                <img class="d-block w-100" src="<?= $schoolPhoto->base_url.$schoolPhoto->path?>" alt="<?= $schoolObj->title ?>">
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
            <div class="col-sm-7">
                <h2 class="text-primary"><?= $schoolObj->title ?></h2>
                <h5>
                    <div class="rating fr">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":<?= $schoolObj->total_rating ?:1; ?>, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(<?= $schoolObj->no_of_ratings?:1 ?>)</span>
                    </div>
                    <div class="item-location text-muted"><img src="<?= $schoolObj->country->flag ?>" alt="" width="16px" height="12px">
                        <?= $schoolObj->country->title .' - '.$schoolObj->state->title .' - '. $schoolObj->city->title  ?>
                </h5>
                <div class="mtlg">
                    <?= $schoolObj->details ?>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        <div class="university-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="programs-tab" data-toggle="tab" href="#tabPrograms" role="tab" aria-controls="programs" aria-selected="false"><?php echo Yii::t('frontend','Courses'); ?> (<?= count($schoolObj->schoolCourses)?>)</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="tabPrograms" role="tabpanel" aria-labelledby="programs-tab">
                    <ul class="majorsList">
                    <?php
                     if($schoolObj->schoolCourses){
                         foreach ($schoolObj->schoolCourses as $schoolCourse) {
                             ?>
                             <li>- <a href="/school/course/<?= $schoolCourse->slug ;?>"><?= $schoolCourse->title ?></a> </li>

                             <?
                         }
                     }
                    ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>



<section class="section">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <div class="university-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="images-tab" data-toggle="tab" href="#tabImages" role="tab" aria-controls="images" aria-selected="true"><?php echo Yii::t('common','Images'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#tabVideos" role="tab" aria-controls="videos" aria-selected="false"><?php echo Yii::t('common','Videos'); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabImages" role="tabpanel" aria-labelledby="images-tab">
                            <div class="row">

                                <?php
                                $firstslid= 'active';
                                foreach ($schoolObj->schoolPhotos as $schoolPhoto) {
                                    ?>
                                    <div class="col-sm-6">
                                        <figure class="img">
                                            <a class="img-galley" href="<?= $schoolPhoto->base_url.$schoolPhoto->path?>" data-lightbox="img-gallery-set"
                                               data-title="Click the right half of the image to move forward.">
                                                <img src="<?= $schoolPhoto->base_url.$schoolPhoto->path?>" alt="<?= $schoolObj->title ?>">
                                            </a>
                                        </figure>
                                    </div>
                                    <?
                                    $firstslid='';
                                }
                                ?>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabVideos" role="tabpanel" aria-labelledby="videos-tab">
                            <div class="row">
                                <?php
                                if($schoolObj->schoolVideos){
                                    foreach ($schoolObj->schoolVideos as $schoolVideo) {
                                        ?>
                                        <div class="col-sm-6 mbsm">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= MyYoutubeVideoID($schoolVideo->base_url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    
                                            </div>
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

            <div class="col-sm-6">
                <div>
                    <h2 class="title title-sm title-black"><?php echo Yii::t('common','Location on Map'); ?></h2>
                    <div>
                        <div class="map-wrapper">
                            <iframe src="https://maps.google.com/maps?q=<?= $schoolObj->lat?>,<?= $schoolObj->lng?>&hl=es;z=14&amp;output=embed"
                                    width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
