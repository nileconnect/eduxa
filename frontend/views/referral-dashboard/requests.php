<?php
use backend\models\Requests;
?>
<main class="content">

    <?php
    $this->beginContent('@frontend/views/referral-dashboard/_profile_data.php');
    $this->endContent() ;

    $this->beginContent('@frontend/views/referral-dashboard/_profile_menu.php');
    $this->endContent() ;
    ?>


    <section class="section">
        <div class="container">
            <div class="mtlg">
                <h2 class="title title-sm"><i class="fas fa-paste"></i> My Requests</h2>

                <div class="universities universities-row">


                    <?php
                    if($requests){
                        foreach ($requests as $request) {
                            if($request->model_name = Requests::MODEL_NAME_PROGRAM){
                                $program =$request->program;
                                $university =$request->university;
                                ?>

                                <div class="item">
                                    <header class="item-header">
                                        <figure>
                                            <img src="<?= $university->logoImage?>" alt="<?= $program->title?>" width="310px" height="193px">
                                        </figure>
                                        <div class="item-content">
                                            <div class="item-name">
                                                <span><?= $program->title?></span>
                                                <div class="status">
                                                    <span class="status-text text-primary"><?= Requests::ListStatus()[$request->status]?></span>
                                                    <span class="status-number">#<?= $request->generateRequestId(); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mtsm">
                                                        <div>
                                                            <span>Student Name : </span>
                                                            <span class="text-muted"><?= $request->student_first_name.' '.$request->student_last_name ?></span>
                                                        </div>
                                                        <div>
                                                            <span>Major : </span>
                                                            <span class="text-muted"><?= $program->major->title ?></span>
                                                        </div>
                                                        <div>
                                                            <span>Degree : </span>
                                                            <span class="text-muted"><?= $program->degree->title ?></span>
                                                        </div>
                                                        <div>
                                                            <span>Field : </span>
                                                            <span class="text-muted"><?= $program->field->title ?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mtsm">
                                                        <div>
                                                            <span>Start Day : </span>
                                                            <span class="text-muted"><?= $program->first_submission_date?></span>
                                                        </div>
                                                        <div>
                                                            <span>Reservation Duration : </span>
                                                            <span class="text-muted">
                                                                <?= $program->study_duration_no ?>
                                                                <?= \backend\models\University::listPeriods()[$program->study_duration] ?></span>
                                                        </div>
                                                        <div>
                                                            <span>Country : </span>
                                                            <span class="text-muted"><?= $university->country->title?></span>
                                                        </div>
                                                        <div>
                                                            <span>State : </span>
                                                            <span class="text-muted"><?= $university->state->title?></span>
                                                        </div>
                                                        <div>
                                                            <span>City : </span>
                                                            <span class="text-muted"><?= $university->city->title?></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                if($request->status == Requests::STATUS_PENDING){
                                                    ?>
                                                    <div class="col-sm-12">
                                                        <a href="/dashboard/cancel-request/<?= $program->slug ?>" class="button button-wide button-primary pull-right" >Cancel</a>
                                                    </div>
                                                    <?
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </header>
                                </div>
                                <?
                            }

                        }
                    }

                    ?>

                </div>
            </div>

        </div>
    </section>

</main>