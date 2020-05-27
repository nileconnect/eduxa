<div class="profile-nav bg-white">
    <div class="container">

        <ul class="nav nav-pills regular border-white">
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->action->id == 'index') echo 'active';?>" href="/dashboard"><?php echo Yii::t('frontend','Profile Info'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->action->id == 'education') echo 'active';?> " href="/dashboard/education"><?php echo Yii::t('frontend','Education Info'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(Yii::$app->controller->action->id == 'requests') echo 'active';?>" href="/dashboard/requests"><?php echo Yii::t('frontend','My Requests'); ?></a>
            </li>
        </ul>

    </div>
</div>
