<div class="profile-nav bg-white">
    <div class="container">

        <ul class="nav nav-pills regular border-white">
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->action->id == 'index') echo 'active';?>" href="/referral-dashboard"><?php echo Yii::t('frontend','Profile Info'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->action->id == 'requests') echo 'active';?>" href="/referral-dashboard/requests"><?php echo Yii::t('frontend','My Requests'); ?></a>
            </li>
        </ul>

    </div>
</div>
