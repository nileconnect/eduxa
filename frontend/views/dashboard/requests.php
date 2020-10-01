<main class="content">

    <?php

    use backend\models\Requests;
    use backend\models\SchoolCourse;

    $this->beginContent('@frontend/views/dashboard/_profile_data.php');
    $this->endContent() ;

    $this->beginContent('@frontend/views/dashboard/_profile_menu.php');
    $this->endContent() ;
    ?>


	<section class="section">
		<div class="container">

			<div class="mtlg">
				<h2 class="title title-sm"><i class="fas fa-paste"></i> <?= Yii::t('frontend','My Requests')?></h2>
			
				<div class="universities universities-row">

                    <?php
                    if($requests){
                        foreach ($requests as $request) {
                            if($request->model_name == Requests::MODEL_NAME_PROGRAM){
                                $program =$request->modelObj;
                                $university =$request->modelParentObj;
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
                                                            <span><?= Yii::t('frontend','Start Day')   ?> : </span>
                                                            <span class="text-muted"><?= $program->first_submission_date?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','Reservation Duration')   ?> : </span>
                                                            <span class="text-muted">
                                                                <?= $program->study_duration_no ?>
                                                                <?= \backend\models\University::listPeriods()[$program->study_duration] ?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','Country')   ?> : </span>
                                                            <span class="text-muted"><?= $university->country->title?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','State')   ?> : </span>
                                                            <span class="text-muted"><?= $university->state->title?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','City')   ?> : </span>
                                                            <span class="text-muted"><?= $university->city->title?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mtsm">
                                                        <div>
                                                            <span><?= Yii::t('frontend','Major')   ?> : </span>
                                                            <span class="text-muted"><?= $program->major->title ?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','Degree')   ?> : </span>
                                                            <span class="text-muted"><?= $program->degree->title ?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','Field')   ?> : </span>
                                                            <span class="text-muted"><?= $program->field->title ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                <?php
                                                if($request->status == Requests::STATUS_PENDING){
                                                  ?>

                                                        <a href="/dashboard/cancel-request/<?= $program->slug ?>" class="button button-wide button-primary pull-right" ><?= Yii::t('frontend','Cancel')   ?></a>


                                                    <?
                                                }
                                                if($request->user_notes){
                                                    ?>
                                                    <a  class="button button-wide button-default pull-right" style=" margin: 0 10px;"  data-toggle="modal"
                                                        data-target="#exampleModal_<?= $request->id?>">
                                                        <?= Yii::t('common', 'Request Notes'); ?>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal_<?= $request->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?= Yii::t('common', 'Request Notes'); ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?= $request->user_notes?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= Yii::t('frontend','Close')?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                }
                                                ?>

                                                    </div>

                                            </div>
                                        </div>
                                    </header>
                                </div>
                                <?
                            }else{

                                $course =$request->modelObj;
                                $school =$request->modelParentObj;
                                ?>

                                <div class="item">
                                    <header class="item-header">
                                        <figure>
                                            <img src="<?= $school->logoImage?>" alt="<?= $course->title?>" width="310px" height="193px">
                                        </figure>
                                        <div class="item-content">
                                            <div class="item-name">
                                                <span> <?= $school->title ?> - <?= $course->title?></span>
                                                <div class="status">
                                                    <span class="status-text text-primary"><?= Requests::ListStatus()[$request->status]?></span>
                                                    <span class="status-number">#<?= $request->generateRequestId(); ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mtsm">
                                                        <div>
                                                            <span><?= Yii::t('frontend','Course Type')   ?> : </span>
                                                            <span class="text-muted"><?= $course->schoolCourseType->title?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','Study Language')   ?> : </span>
                                                            <span class="text-muted">
                                                                <?= $course->schoolCourseStudyLanguage->title ?>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','Country')   ?> : </span>
                                                            <span class="text-muted"><?= $school->country->title?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','State')   ?> : </span>
                                                            <span class="text-muted"><?= $school->state->title?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend','City')   ?> : </span>
                                                            <span class="text-muted"><?= $school->city->title?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mtsm">
                                                        <div>
                                                            <span><?= Yii::t('frontend' , 'Minimum Entry Level')?> : </span>
                                                            <span class="text-muted"><?=  SchoolCourse::ListLevels()[$course->required_level] ?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend' , 'Study Time')?> : </span>
                                                            <span class="text-muted"><?= SchoolCourse::ListCourseTime()[$course->time_of_course] ?></span>
                                                        </div>
                                                        <div>
                                                            <span><?= Yii::t('frontend' , 'Lessons/Week')?> : </span>
                                                            <span class="text-muted"><?= $course->lessons_per_week; ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                <?php
                                                if($request->status == Requests::STATUS_PENDING){
                                                    ?>

                                                        <a href="/dashboard/cancel-course-request/<?= $course->slug ?>" class="button button-wide button-primary pull-right" ><?= Yii::t('frontend','Cancel')   ?></a>

                                                    <?
                                                }
                                                if($request->user_notes){
                                                    ?>
                                                    <a  class="button button-wide button-default pull-right" style=" margin: 0 10px;"  data-toggle="modal"
                                                        data-target="#exampleModal_<?= $request->id?>">
                                                        <?= Yii::t('frontend','Request notes')?>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal_<?= $request->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?= Yii::t('common', 'Request Notes'); ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?= $request->user_notes?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?
                                                }

                                                ?>





                                                </div>


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