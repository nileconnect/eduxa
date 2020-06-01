<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/university/<?= $universityObj->slug?>"><?= $universityObj->title ?></a></li>
        </ol>
    </div>
</nav>


<section class="section">
    <div class="container">
        <div class="row">

            <div class="container">
                <h3 class="text-primary"><?= $universityObj->title ?>: <?= $programObj->title ?> <span>(<?= $programObj->major->title ?>)</span></h3>
                <h5>
                    <div class="rating fr">
                        <div class="jq_rating jq-stars" data-options='{"initialRating":4.8, "readOnly":true, "starSize":19}'></div>
                        <span class="text-muted">(628)</span>
                    </div>
                    <div class="item-location text-muted"><img src="<?= $universityObj->country->flag ?>" alt="" width="16px" height="12px">
                        <?= $universityObj->country->title .' - '.$universityObj->state->title .' - '. $universityObj->city->title  ?>
                    </div>
                </h5>
                <div class="mtlg">
                    <?= $universityObj->description ?>
                </div>
                <div class="mtxlg">
                    <a href="/dashboard/requests/<?= $programObj->slug ?>" class="button button-wide button-primary">Apply Now</a>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="section">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black">Program requirements</h2>
                <table class="table wide-cell text-large bg-white b-all shadow-sm">
                    <tbody>
                    <tr>
                        <td>Degree</td>
                        <td><span class="text-primary"><?= $programObj->degree->title ?></span></td>
                    </tr>
                    <tr>
                        <td>Program Name</td>
                        <td><span class="text-primary"><?= $programObj->title ?></span></td>
                    </tr>
                    <tr>
                        <td>University</td>
                        <td><span class="text-primary"><?= $universityObj->title ?></span></td>
                    </tr>

                    <?php
                    if($programObj->first_submission_date_active){
                        ?>
                        <tr>
                            <td>First Submission date</td>
                            <td>
                                <div><span class="text-primary"><?= $programObj->first_submission_date?></span></div>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                    <?php
                    if($programObj->last_submission_date){
                        ?>
                        <tr>
                            <td>Last date for application</td>
                            <td>
                                <div><span class="text-primary"><?= $programObj->last_submission_date?></span></div>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                   <?php
                   echo $this->render('_programstartdates', ['programStartDates' => $programStartDates]);

                   ?>



                    <tr>
                        <td>Study method</td>
                        <td><span class="text-primary"><?= $programObj->methodOfStudy->title?></span></td>
                    </tr>
                    <tr>
                        <td>Program format</td>
                        <td><span class="text-primary"><?= $programObj->formatOfProg->title?></span></td>
                    </tr>
                    <tr>
                        <td>Annual cost</td>
                        <td><span class="text-primary"><?= $programObj->annual_cost?> <span><?= $universityObj->currency->currency_code?></span></span></td>
                    </tr>
                    <tr>
                        <td>Conditional admission</td>
                        <td><span class="text-primary"><?= $programObj->conditionalAdm->title ?></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-6 mbxlg">
                <h2 class="title title-sm title-black">.</h2>
                <table class="table bg-white b-all shadow-sm">
                    <tr>
                        <td>Study duration</td>
                        <td><span class="text-primary"><?= $programObj->study_duration_no ?> </span><span><?= \backend\models\University::listPeriods()[$programObj->study_duration] ?></span></td>
                    </tr>
                    <tr>
                        <td>Study language</td>
                        <td><span class="text-primary"><?= $programObj->studyLang->title ; ?></span></td>
                    </tr>
                    <tr>
                        <td>TOEFL</td>
                        <td><span class="text-primary"><?=  $programObj->toefl?></span></td>
                    </tr>
                    <tr>
                        <td>IELTS</td>
                        <td><span class="text-primary"><?=  $programObj->progIelts->title ?></span></td>
                    </tr>
                    <tr>
                        <td>Bank statment</td>
                        <td><span class="text-primary"><?= $programObj->bank_statment?>  <?= $universityObj->currency->currency_code ?></span></td>
                    </tr>
                    <tr>
                        <td>High school transcript</td>
                        <td><span class="text-primary"><?= $programObj->high_school_transcript ?></td>
                    </tr>
                    <tr>
                        <td>Bachelor degree certificate</td>
                        <td><span class="text-primary"><?= $programObj->bachelor_degree ?></span></td>
                    </tr>
                    <tr>
                        <td>Note 1</td>
                        <td><span class="text-primary"><?= $programObj->note1 ?></span></td>
                    </tr>
                    <tr>
                        <td>Note 2</td>
                        <td><span class="text-primary"><?= $programObj->note1 ?> </span></td>
                    </tr>
                </table>

                <div class="mtlg">
                    <a href="/dashboard/requests/<?= $programObj->slug ?>" class="button btn-block button-wide button-primary text-large">Submit</a>
                </div>
            </div>
        </div>


    </div>
</section>
