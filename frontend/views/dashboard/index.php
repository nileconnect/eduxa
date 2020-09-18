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
				<h2 class="title title-sm"><i class="far fa-user"></i> <?php echo Yii::t('frontend','My Personal Info.'); ?></h2>
				
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
							<span><?php echo Yii::t('common','Gender'); ?> : </span>
							<span class="text-muted"><?= \common\models\UserProfile::ListGender()[ $profile->gender]?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('frontend','Mobile Number'); ?> : </span>
							<span class="text-muted"><?= $profile->mobile ?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('common','Nationality'); ?> : </span>
							<span class="text-muted"><?= $profile ->nationality?></span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="text-large">
							<span><?php echo Yii::t('common','Country'); ?> : </span>
							<span class="text-muted"><?= $profile->country->title?></span>
						</div>
                        <div class="text-large">
                            <span><?php echo Yii::t('common','State'); ?> : </span>
                            <span class="text-muted"><?= $profile->state->title?></span>
                        </div>
						<div class="text-large">
							<span><?php echo Yii::t('common','City'); ?> : </span>
							<span class="text-muted"><?= $profile->city->title?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('common','Best way to reach me'); ?> : </span>
							<span class="text-muted"><?= \common\models\UserProfile::ListCommunicateChannels()[$profile->communtication_channel]?></span>
						</div>
						<div class="text-large">
							<span><?php echo Yii::t('common',"I'm Intersted In"); ?> : </span>

                            <?php if($profile->interested_in_university){
                                ?>
                                <span class="text-muted"> <?php echo Yii::t('common','University Education'); ?></span> ,

                                <?
                            }
                            ?>
                            <?php if($profile->interested_in_schools){
                                ?>
                                <span class="text-muted"> <?php echo Yii::t('common','Language School'); ?> </span>

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
