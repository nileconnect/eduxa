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
				<h2 class="title title-sm"><i class="far fa-user"></i> <?php echo Yii::t('frontend','Profile Summery'); ?></h2>
				
				<div class="row bg-white shadow-sm ptlg prlg pllg pblg">
					<div class="col-sm-6">
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Name'); ?> : </span>
							<span class="text-muted"><?= $profile->fullName?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Email'); ?> : </span>
							<span class="text-muted"><?= $user->email?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Gender'); ?> : </span>
							<span class="text-muted"><?= \common\models\UserProfile::ListGender()[ $profile->gender]?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Mobile Number'); ?> : </span>
							<span class="text-muted"><?= $profile->mobile ?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Nationality'); ?> : </span>
							<span class="text-muted"><?= $profile ->nationality?></span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-large">
							<span><?php echo Yii::t('frontend','County'); ?> : </span>
							<span class="text-muted"><?= $profile->country->title?></span>
						</div>
                        <div class="text-large">
                            <span><?php echo Yii::t('frontend','State'); ?> : </span>
                            <span class="text-muted"><?= $profile->state->title?></span>
                        </div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','City'); ?> : </span>
							<span class="text-muted"><?= $profile->city->title?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Best way of communication'); ?> : </span>
							<span class="text-muted"><?= \common\models\UserProfile::ListCommunicateChannels()[$profile->communtication_channel]?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Intersted In'); ?> : </span>

                            <?php if($profile->interested_in_university){
                                ?>
                                <span class="text-muted">University Education</span> ,

                                <?
                            }
                            ?>
                            <?php if($profile->interested_in_schools){
                                ?>
                                <span class="text-muted">Language School</span>

                                <?
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

</main>
