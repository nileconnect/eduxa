<main class="content">
    <?php

    $this->beginContent('@frontend/views/dashboard/_profile_data.php');
    $this->endContent() ;

    $this->beginContent('@frontend/views/dashboard/_profile_menu.php');
    $this->endContent() ;
    ?>

	<section class="section">
		<div class="container">
			
			<div class="mtlg">


				
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> <?php echo Yii::t('frontend','Certificates'); ?></h2>

				<?php
                if($user->studentCertificates){
                    foreach ($user->studentCertificates as $userCertificate) {
                        ?>
                        <div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm">
                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Certificate'); ?> : </span>
                                    <span class="text-muted"><?= $userCertificate->certificate_name?></span>
                                </div>
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Grade'); ?> : </span>
                                    <span class="text-muted"><?= $userCertificate->grade?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Year of Graduation'); ?> :</span>
                                    <span class="text-muted"><?= $userCertificate->year?></span>
                                </div>
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','University or School'); ?> : </span>
                                    <span class="text-muted"><?= $userCertificate->university_or_school ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Country'); ?> : </span>
                                    <span class="text-muted"><?= $userCertificate->country->title?></span>
                                </div>
                            </div>
                            <div class="col-sm-12">

                                <a class="button button-wide button-primary pull-right"  data-fancybox="" data-type="iframe"
                                   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                                   href="/dashboard/certificate?id=<?= $userCertificate->id ?>">
								   <?php echo Yii::t('common','Edit'); ?>
                                </a>

                            </div>
                        </div>
                        <?
                    }
                }
                ?>

				<div class="mtlg">
                    <a class="button button-wide button-primary" data-fancybox="" data-type="iframe"
                       data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                       href="/dashboard/certificate">
					   <?php echo Yii::t('frontend','Add Certificate'); ?>
                    </a>
				</div>



				<div class="mtlg">
				
				<h2 class="title title-sm"><i class="fas fa-graduation-cap"></i> <?php echo Yii::t('frontend','Test Results'); ?></h2>

                    <?php
                    if($user->studentTestResults){
                    foreach ($user->studentTestResults as $userTest) {
                    ?>
                        <div class="row mtmd bg-white pllg prlg ptlg pblg shadow-sm">
                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Test Name'); ?> : </span>
                                    <span class="text-muted"><?= $userTest->test_name ?></span>
                                </div>
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Score'); ?> : </span>
                                    <span class="text-muted"><?= $userTest->score ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-large">
                                    <span><?php echo Yii::t('frontend','Test Date'); ?> :</span>
                                    <span class="text-muted"><?= $userTest->test_date ?></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <a class="button button-wide button-primary pull-right"  data-fancybox="" data-type="iframe"
                                   data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                                   href="/dashboard/test-results?id=<?= $userTest->id ?>">
								   <?php echo Yii::t('common','Edit'); ?>
                                </a>
                            </div>

                        </div>

                        <?
                     }
                    }
                    ?>
                    <div class="mtlg">
                        <a class="button button-wide button-primary" data-fancybox="" data-type="iframe"
                           data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "600px" , "height" : "400px" }}}'
                           href="/dashboard/test-results">
						   <?php echo Yii::t('frontend','Add Test Results'); ?>
                        </a>
                    </div>

			</div>
			</div>

		</div>
	</section>

</main>
