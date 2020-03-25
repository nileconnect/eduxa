
<ul class="nav nav-tabs translateTabs">

    <?php foreach (Yii::$app->params['mlConfig']['languages'] as $languageCode => $languageName): ?>

        <li class="<?= (Yii::$app->language == $languageCode) ? 'active' : '' ?>" id="<?= $languageCode ?>">
            <a>
                <?= $languageName ?>
            </a>
        </li>
    <?php endforeach ?>
    <li style="    margin-top: 4px;font-weight: bold;">Switch Language:</li>
</ul>