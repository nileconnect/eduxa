<?php
use backend\assets\BackendAsset;
use backend\assets\BackendArabic;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */



if(Yii::$app->user->isGuest){
    $bundle = BackendAsset::register($this);
}else{
    if(Yii::$app->user->identity->userProfile->locale == 'en-US') {
        $bundle = BackendAsset::register($this);
    }else{
        $bundle =BackendArabic::register($this);
    }
}



$this->params['body-class'] = $this->params['body-class'] ?? null;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<?php echo Html::beginTag('body', [
    'class' => implode(' ', [
        ArrayHelper::getValue($this->params, 'body-class'),
        Yii::$app->keyStorage->get('backend.theme-skin', 'skin-blue'),
        Yii::$app->keyStorage->get('backend.layout-fixed') ? 'fixed' : null,
        Yii::$app->keyStorage->get('backend.layout-boxed') ? 'layout-boxed' : null,
        Yii::$app->keyStorage->get('backend.layout-collapsed-sidebar') ? 'sidebar-collapse' : null,
        Yii::$app->keyStorage->get('backend.sidebar-mini') ? 'sidebar-mini' : null,
    ])
])?>
    <?php $this->beginBody() ?>
        <?php echo $content ?>
    <?php $this->endBody() ?>
    
<?php echo Html::endTag('body') ?>

<script>
$('#fileupload')
    // .on('fileuploadadd', function (e, data) { console.log('fileuploadadd') })
    // .on('fileuploadadded', function (e, data) { console.log('fileuploadadded') })
    .on('fileuploadchunkfail', function (e, data) { console.log('fileuploadchunkfail')})
</script>
</html>
<?php $this->endPage() ?>
