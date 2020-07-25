<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */



if(Yii::$app->language=='ar'){
   \frontend\assets\FrontendAssetAr::register($this);
}else{
    \frontend\assets\FrontendAsset::register($this);
}



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo Html::encode($this->title) ?></title>


    <link rel="icon" href="/img/favicon.ico">


    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>

    <script>
        (function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
    </script>
</head>
<body>
<?php $this->beginBody() ?>
    <?php echo $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
