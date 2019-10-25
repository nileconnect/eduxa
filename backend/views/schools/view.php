<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schools-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'Schools').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">

            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <? /*= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/
            ?>
        </div>
    </div>

    <div class="row">
<?php
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute'=>'logo',
            'displayOnly'=>true,
            'value'=>
                "<img style='max-height:50px;' src='".$model->image_base_url.$model->image_path ."' width='120' /> <a href='download?file=$model->image_path' style='
                                                    background: #03A9F4;
                                                    max-height:50px;
                                                    padding: 13px;
                                                    margin-right: 30px;
                                                    border-radius: 100px;
                                                    width: 40px;
                                                    height: 40px;
                                                    display: inline-block;
                                                    color: white;
                                                    line-height: 10px;> 
                                                    <i style='color:white !important; ' class='fa fa-download'></i>
                                                </a> "
            ,
            'format'=>'raw',
            'visible'=> $model->logo ? true:false  ,

            'valueColOptions'=>['style'=>'width:30%;background: #87b1d11a;text-align:center;border-radius:10px;']
        ],
        'title',
        'status:boolean',

        [
            'attribute' => 'courseType.title',
            'label' => Yii::t('backend', 'Course Type'),
        ],
        'discount',
        'total_rating',
        'no_of_ratings',

        'details:ntext',
        'featured',
        'location',
        'lat',
        'lng',
        'image_base_url:url',
        'image_path',
        'country_id',
        'city_id',
        'min_age',
        'start_every',
        'study_time',
        'max_students_per_class',
        'avg_students_per_class',
        'lessons_per_week',
        'hours_per_week',
        'accomodation_fees',
        'registeration_fees',
        'study_books_fees',
        'fees_per_week',

    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>SchoolsCourseTypes<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php
    $gridColumnSchoolsCourseTypes = [
        ['attribute' => 'id', 'visible' => false],
        'title',
    ];
    echo DetailView::widget([
        'model' => $model->courseType,
        'attributes' => $gridColumnSchoolsCourseTypes    ]);
    ?>

    <div class="row">
        <?php
        if($providerSchoolRating->totalCount){
            $gridColumnSchoolRating = [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'id', 'visible' => false],
               // 'user_id',
                'name',
                'comment:ntext',
                'rating',
                'status',
            ];
            echo Gridview::widget([
                'dataProvider' => $providerSchoolRating,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-rating']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Rating')),
                ],
                'export' => false,
                'columns' => $gridColumnSchoolRating
            ]);
        }
        ?>

    </div>



    <div class="row">
    <?php
    if($providerSchoolVideos->totalCount){
        $gridColumnSchoolVideos = [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
           // 'path',
            'base_url:url',
//            'type',
//            'size',
            'name',
            //'order',
        ];
        echo Gridview::widget([
            'dataProvider' => $providerSchoolVideos,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-school-videos']],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'School Videos')),
            ],
            'export' => false,
            'columns' => $gridColumnSchoolVideos
        ]);
    }
    ?>

</div>

</div>
