<?php
use yii\widgets\ListView;

$this->title = "Universities";

?>
<div class="jumbotron jumbotron-img" >
    <div class="img-layer" style="background-image: url('/img/banners/banner1.jpg');"></div>
</div>

<?php  echo $this->render('_advancedsearch', ['model' => $searchModel]); ?>



<section class="section">
    <div class="container">
        <h2 class="title title-sm" style="color:#C5C5DA;"><?= $dataProvider->getTotalCount() ?> <?= Yii::t('frontend','University matched your search results') ?>
        
<!--        <div class="form-group">-->
<!--            --><?//= $form->field($model, 'sorting')->widget(\kartik\widgets\Select2::classname(), [
//                'data' =>['1'=>'Recommended','0'=>'Not Recommended','2'=> Yii::t('frontend','Price Ascending'),'3'=>  Yii::t('frontend','Price Descending')],
//                'options' => ['placeholder' => Yii::t('frontend', 'Sort')],
//                'pluginOptions' => [
//                    'allowClear' => true
//                ],
//            ])->label(false); ?>
<!---->
<!--        </div>-->


        </h2>

        <div class="universities universities-row">
            <?php
            $view = $this;
          echo   ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['class' => 'list-view'],
                'layout' => '{items}',
                'itemOptions' => ['class' => 'col l6 m12 s12'],
                'itemView' => function ($model, $key, $index, $widget) use ($view) {
                    return $this->render('_universityItem', ['program' => $model]);
                    // return $this->render('_universityItem', ['university' => $model]); // old
                },
            ])


            ?>


        </div>


        <nav aria-label="Page navigation example" class="text-center">

            <?=
            yii\widgets\LinkPager::widget([
                'pagination' => $dataProvider->pagination,
            ])
            ?>

<!--            <ul class="pagination text-center">-->
<!--                <li class="page-item ">-->
<!--                    <a class="page-link" href="#" aria-label="Previous">-->
<!--                        <span aria-hidden="true">&laquo;</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
<!--                <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                <li class="page-item">-->
<!--                    <a class="page-link" href="#" aria-label="Next">-->
<!--                        <span aria-hidden="true">&raquo;</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
        </nav>

    </div>
</section>

