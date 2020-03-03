<?php
/**
 * @var $this yii\web\View
 * @var $content string
 */
?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>


<?php
if(Yii::$app->session->hasFlash('alert')){
    echo \kartik\growl\Growl::widget([
        'type' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'type'), //Growl::TYPE_SUCCESS,// ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'type'), //
        'icon' => 'glyphicon glyphicon-ok-sign',
        //'title' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'title'),
        'showSeparator' => true,
        'body' => \yii\helpers\ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
        'showSeparator' => false,
        'pluginOptions' => [
            'showProgressbar' => true,
            'placement' => [
                'from' => 'bottom',
                'align' => 'center',
            ]
        ]
    ]);
}

?>


    <div class="box">
        <div class="box-body">
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>
