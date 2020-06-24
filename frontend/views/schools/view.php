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
                <div class="mtlg">
                    <a href="#" class="button button-primary button-wide">Apply Now</a>
                    <p class="mtsm text-large">Best Weekly Price : 140 USD <span class="line-through text-red">165 USD</span></p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2 class="title title-black title-sm">Course type</h2>

        <div class="ptlg pblg prlg pllg bg-white b-all text-large">
            <p>
                Conversations can be a tricky business. Sometimes, decoding what is said with what is meant is difficult at best. However, communication is a necessary tool in todays world. And it’s not only speaking that can be difficult, but trying to interpret body language, and other language barriers are just a few of the obstacles barring effective communication. It’s often been the case were one party completely miscommunicates to another due to a misunderstanding between parties. 
            </p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        
        <div class="row">
            <div class="col-sm-6 ">

                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        <tr>
                            <td>Minimum age</td>
                            <td><span class="text-primary">26 Years</span></td>
                        </tr>
                        <tr>
                            <td>Begining of study</td>
                            <td>
                                <div class="text-primary">25 Augest 2019</div>
                                <div class="text-primary">30 September 2019</div>
                            </td>
                        </tr>
                        <tr>
                            <td>Study Time</td>
                            <td><span class="text-primary">Morning</span></td>
                        </tr>
                        <tr>
                            <td>Max students</td>
                            <td><span class="text-primary">12</span></td>
                        </tr>
                        <tr>
                            <td>Lessons/Week</td>
                            <td><span class="text-primary">22</span></td>
                        </tr>
                        <tr>
                            <td>Hours/Week</td>
                            <td><span class="text-primary">19</span></td>
                        </tr>
                        <tr>
                            <td>Average Students</td>
                            <td><span class="text-primary">10</span></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="bg-white shadow-sm b-all mtmd">
                    <div class="pllg prlg pblg ptlg">
                        <div class="select-wrapper">
                            <select name="" id="" class="form-control">
                                <option>Accommodation options</option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                            </select>
                        </div>
                        <div class="select-wrapper mtmd">
                            <select name="" id="" class="form-control">
                                <option>Accommodation weeks</option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                            </select>
                        </div>
                    </div>
                    <table class="table text-large wide-cell">
                        <tbody>
                            <tr>
                                <td>Room Type</td>
                                <td><span class="text-primary">Standard</span></td>
                            </tr>
                            <tr>
                                <td>Booking Cycle</td>
                                <td><span class="text-primary">Standard</span></td>
                            </tr>
                            <tr>
                                <td>Min Age</td>
                                <td><span class="text-primary">26 Years</span></td>
                            </tr>
                            <tr>
                                <td>Distance From School</td>
                                <td><span class="text-primary">250 Meters Away</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-sm-6">
                <table class="table wide-cell text-large bg-white shadow-sm plmd prmd pbmd b-all">
                    <tbody>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Course type</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Start Date</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Course Duration</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Airport pickup</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="select-wrapper">
                                    <select name="" id="" class="form-control">
                                        <option>Health Insurence</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </td>
                            <td><span class="text-primary">50 USD</span></td>
                        </tr>
                        <tr>
                            <td>Accomodation fees</td>
                            <td><span class="text-primary">20 USD</span></td>
                        </tr>
                        <tr>
                            <td>Registeration fees</td>
                            <td><span class="text-primary">20 USD</span></td>
                        </tr>
                        <tr>
                            <td>Study books fees</td>
                            <td><span class="text-primary">20 USD</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="bg-primary text-center"><h3>Total: 240 USD</h3></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="mtlg">
                    <a href="#" class="button button-primary btn-block text-large">Apply Now</a>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        
        <div class="universities universities-row">

            <div class="item">
                <header class="item-header">
                    <figure>
                        <img src="img/destinations/1.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Auburn - Alabama - USA</span>
                        </div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money. 
                        </div>
                    </div>
                </header>
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

<section class="section">
    <div class="container">
        <h2 class="title text-center">Other courses in Language Academy </h2>

        <div class="universities universities-row">

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">15%</span>
                        <img src="img/destinations/1.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Language Academy - General English</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options="{&quot;initialRating&quot;:4.8, &quot;readOnly&quot;:true, &quot;starSize&quot;:19}"><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-391{fill:url(#391_SVGID_1_);}.svg-hovered-391{fill:url(#391_SVGID_2_);}.svg-active-391{fill:url(#391_SVGID_3_);}.svg-rated-391{fill:#FFCB04;}</style><linearGradient id="391_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="391_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="391_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-391" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-391{fill:url(#391_SVGID_1_);}.svg-hovered-391{fill:url(#391_SVGID_2_);}.svg-active-391{fill:url(#391_SVGID_3_);}.svg-rated-391{fill:#FFCB04;}</style><linearGradient id="391_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="391_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="391_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-391" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-391{fill:url(#391_SVGID_1_);}.svg-hovered-391{fill:url(#391_SVGID_2_);}.svg-active-391{fill:url(#391_SVGID_3_);}.svg-rated-391{fill:#FFCB04;}</style><linearGradient id="391_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="391_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="391_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-391" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-391{fill:url(#391_SVGID_1_);}.svg-hovered-391{fill:url(#391_SVGID_2_);}.svg-active-391{fill:url(#391_SVGID_3_);}.svg-rated-391{fill:#FFCB04;}</style><linearGradient id="391_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="391_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="391_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-391" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-391{fill:url(#391_SVGID_1_);}.svg-hovered-391{fill:url(#391_SVGID_2_);}.svg-active-391{fill:url(#391_SVGID_3_);}.svg-rated-391{fill:#FFCB04;}</style><linearGradient id="391_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="391_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="391_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-391" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-391" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div></div> 
                                <span class="text-muted">(628)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/fr.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money. 
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Hours/week</div>
                        <div>22 hrs</div>
                    </div>
                    <div>
                        <div class="item-label">Study Time</div>
                        <div>Morning</div>
                    </div>
                    <div>
                        <div class="item-label">Best price</div>
                        <div><span class="original-price">150</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
                        <div><span class="converted-price">2500</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <span class="cut-off">25%</span>
                        <img src="img/destinations/4.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Language Academy - General English</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options="{&quot;initialRating&quot;:4.8, &quot;readOnly&quot;:true, &quot;starSize&quot;:19}"><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-732{fill:url(#732_SVGID_1_);}.svg-hovered-732{fill:url(#732_SVGID_2_);}.svg-active-732{fill:url(#732_SVGID_3_);}.svg-rated-732{fill:#FFCB04;}</style><linearGradient id="732_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="732_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="732_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-732" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-732{fill:url(#732_SVGID_1_);}.svg-hovered-732{fill:url(#732_SVGID_2_);}.svg-active-732{fill:url(#732_SVGID_3_);}.svg-rated-732{fill:#FFCB04;}</style><linearGradient id="732_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="732_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="732_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-732" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-732{fill:url(#732_SVGID_1_);}.svg-hovered-732{fill:url(#732_SVGID_2_);}.svg-active-732{fill:url(#732_SVGID_3_);}.svg-rated-732{fill:#FFCB04;}</style><linearGradient id="732_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="732_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="732_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-732" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-732{fill:url(#732_SVGID_1_);}.svg-hovered-732{fill:url(#732_SVGID_2_);}.svg-active-732{fill:url(#732_SVGID_3_);}.svg-rated-732{fill:#FFCB04;}</style><linearGradient id="732_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="732_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="732_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-732" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-732{fill:url(#732_SVGID_1_);}.svg-hovered-732{fill:url(#732_SVGID_2_);}.svg-active-732{fill:url(#732_SVGID_3_);}.svg-rated-732{fill:#FFCB04;}</style><linearGradient id="732_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="732_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="732_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-732" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-732" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div></div> 
                                <span class="text-muted">(628)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/fr.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money. 
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Hours/week</div>
                        <div>19 hrs</div>
                    </div>
                    <div>
                        <div class="item-label">Study Time</div>
                        <div>Morning</div>
                    </div>
                    <div>
                        <div class="item-label">Best price</div>
                        <div><span class="original-price">150</span><span class="sale-on">27.00</span> <span class="currency">USD</span></div>
                        <div><span class="converted-price">2500</span> <span class="sale-on">27.00</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

            <div class="item">
                <header class="item-header">
                    <figure>
                        <img src="img/destinations/3.jpg" alt="">
                    </figure>
                    <div class="item-content">
                        <div class="item-name">
                            <span>Language Academy - General English</span>
                            <div class="rating">
                                <div class="jq_rating jq-stars" data-options="{&quot;initialRating&quot;:4.8, &quot;readOnly&quot;:true, &quot;starSize&quot;:19}"><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-668{fill:url(#668_SVGID_1_);}.svg-hovered-668{fill:url(#668_SVGID_2_);}.svg-active-668{fill:url(#668_SVGID_3_);}.svg-rated-668{fill:#FFCB04;}</style><linearGradient id="668_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="668_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="668_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-668" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-668{fill:url(#668_SVGID_1_);}.svg-hovered-668{fill:url(#668_SVGID_2_);}.svg-active-668{fill:url(#668_SVGID_3_);}.svg-rated-668{fill:#FFCB04;}</style><linearGradient id="668_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="668_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="668_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-668" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-668{fill:url(#668_SVGID_1_);}.svg-hovered-668{fill:url(#668_SVGID_2_);}.svg-active-668{fill:url(#668_SVGID_3_);}.svg-rated-668{fill:#FFCB04;}</style><linearGradient id="668_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="668_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="668_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-668" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-668{fill:url(#668_SVGID_1_);}.svg-hovered-668{fill:url(#668_SVGID_2_);}.svg-active-668{fill:url(#668_SVGID_3_);}.svg-rated-668{fill:#FFCB04;}</style><linearGradient id="668_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="668_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="668_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-668" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div><div class="jq-star" style="width:19px;  height:19px;"><svg version="1.0" class="jq-star-svg" shape-rendering="geometricPrecision" xmlns="http://www.w3.org/2000/svg" width="550px" height="500.2px" viewBox="0 146.8 550 500.2" style="enable-background:new 0 0 550 500.2; stroke-width:0px;" xml:space="preserve"><style type="text/css">.svg-empty-668{fill:url(#668_SVGID_1_);}.svg-hovered-668{fill:url(#668_SVGID_2_);}.svg-active-668{fill:url(#668_SVGID_3_);}.svg-rated-668{fill:#FFCB04;}</style><linearGradient id="668_SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#c5d0c0"></stop><stop offset="1" style="stop-color:#c5d0c0"></stop> </linearGradient><linearGradient id="668_SVGID_2_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><linearGradient id="668_SVGID_3_" gradientUnits="userSpaceOnUse" x1="0" y1="-50" x2="0" y2="500"><stop offset="0" style="stop-color:#FFCB04"></stop><stop offset="1" style="stop-color:#FFCB04"></stop> </linearGradient><path data-side="center" class="svg-empty-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke: black; fill: transparent; "></path><path data-side="right" class="svg-active-668" d="M520.9,336.5c-3.8-11.8-14.2-20.5-26.5-22.2l-140.9-20.5l-63-127.7 c-5.5-11.2-16.8-18.2-29.3-18.2c-12.5,0-23.8,7-29.3,18.2l-63,127.7L28,314.2C15.7,316,5.4,324.7,1.6,336.5S1,361.3,9.9,370 l102,99.4l-24,140.3c-2.1,12.3,2.9,24.6,13,32c5.7,4.2,12.4,6.2,19.2,6.2c5.2,0,10.5-1.2,15.2-3.8l126-66.3l126,66.2 c4.8,2.6,10,3.8,15.2,3.8c6.8,0,13.5-2.1,19.2-6.2c10.1-7.3,15.1-19.7,13-32l-24-140.3l102-99.4 C521.6,361.3,524.8,348.3,520.9,336.5z" style="stroke-opacity: 0;"></path><path data-side="left" class="svg-active-668" d="M121,648c-7.3,0-14.1-2.2-19.8-6.4c-10.4-7.6-15.6-20.3-13.4-33l24-139.9l-101.6-99 c-9.1-8.9-12.4-22.4-8.6-34.5c3.9-12.1,14.6-21.1,27.2-23l140.4-20.4L232,164.6c5.7-11.6,17.3-18.8,30.2-16.8c0.6,0,1,0.4,1,1 v430.1c0,0.4-0.2,0.7-0.5,0.9l-126,66.3C132,646.6,126.6,648,121,648z" style="stroke: black; stroke-opacity: 0;"></path></svg></div></div> 
                                <span class="text-muted">(65)</span>
                            </div>
                        </div>
                        <div class="item-location"><img src="img/flags/fr.png" alt=""> Auburn - Alabama - USA</div>
                        <div class="item-body">
                            Living in today’s metropolitan world of cellular phones, mobile computers and other high-tech gadgets is not just hectic but very impersonal. We make money and then invest our time and effort in making more money. 
                        </div>
                    </div>
                </header>
                <footer class="item-footer">
                    <div>
                        <div class="item-label">Hours/week</div>
                        <div>41 hrs</div>
                    </div>
                    <div>
                        <div class="item-label">Study Time</div>
                        <div>Morning</div>
                    </div>
                    <div>
                        <div class="item-label">Best price</div>
                        <div><span class="original-price">150</span> <span class="currency">USD</span></div>
                        <div><span class="converted-price">2500</span> <span class="currency">LE</span></div>
                    </div>
                    <div>
                        <a href="#" class="button btn-block button-primary">Additional Info</a>
                    </div>
                </footer>
            </div>

        </div>

    </div>
</section>
