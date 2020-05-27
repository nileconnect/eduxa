<?php
$user =Yii::$app->user->identity ;
$profile =Yii::$app->user->identity->userProfile ;


echo newerton\fancybox3\FancyBox::widget([

    'config' => [
        'iframe' => [
            'preload' => true,
            'css' => [
                'width' => '800px',
                'height' => '500px'
            ]
        ],

    ],
]);


?>
<section class="section bg-white">
    <div class="container">

        <div class="profile_info">
            <div class="profile_basic_info">
                <figure>
                    <a class="edit_profile_info" data-fancybox="" data-type="iframe"
                       data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "400px" , "height" : "400px" }}}'
                       href="/referral-dashboard/update-avatar">
                  <i class="fas fa-pencil-alt"></i></a>
                    <img class="avatar" src="<?= $profile->avatar?>" alt="">
                </figure>
                <div>
                    <h3><?= $profile->fullName?></h3>
                    <div class="text-muted text-large"><?= $profile->country->title; ?>, <?= $profile->state->title; ?>, <?= $profile->city->title; ?></div>
                    <div class="text-muted text-large"><a href="mailto:<?= $user->email ;?>"><?= $user->email ;?></a></div>
                    <div class="text-muted text-large"><a href="tel:<?= $profile->mobile ;?>"><?= $profile->mobile ;?></a></div>
                </div>
            </div>
            <div class="profile_info_complation">
                <div class="profile_complete_progress">
                    <div class="progress">
                        <div class="progress-bar progress-bar-yellow" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    <div class="text-right mrsm text-muted"><small><?php echo Yii::t('frontend','Your Profile is'); ?> 40% <?php echo Yii::t('frontend','complete'); ?></small></div>
                </div>
                <div class="edit_profile_complation">
                    <!--                        <a href="" data-toggle="modal" data-target="#EditprofileModal"><i class="fas fa-edit"></i></a>-->

                    <a class="uploadBtn" data-fancybox="" data-type="iframe"
                       data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "700px" , "height" : "600px" }}}'
                       href="/referral-dashboard/update-profile">
                        <i class="fas fa-edit"></i>
                    </a>


                </div>
            </div>
        </div>

    </div>
</section>
