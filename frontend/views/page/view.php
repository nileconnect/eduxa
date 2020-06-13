<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
$this->title = $model->title;
?>



<section class="section">
    <div class="container">
        <div class="row mbxlg">
            <div class="col-sm-12 mbmd">
                <h3 class="title title-sm"><?php echo $model->title ?></h3>
            </div>
            <?php echo $model->body ?>
        </div>
    </div>
</section>