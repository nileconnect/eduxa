<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
$this->title = $model->title;
?>
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $model->title ?></li>
        </ol>
    </div>
</nav>


<!-- <section class="section">
    <div class="container">
        <div class="row mbxlg">
            <div class="col-sm-12 mbmd">
                <h3 class="title title-sm"><?php echo $model->title ?></h3>
            </div>
            <div class="col-sm-12 mbmd">
                
            </div>
        </div>
    </div>
</section> -->


<?php echo $model->body ?>