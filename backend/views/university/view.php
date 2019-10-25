<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\University */

$this->title = $model->title;
if(Yii::$app->user->id == $model->responsible_id){
    $this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University'), 'url' => ['manager-view']];
}else{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University'), 'url' => ['index']];

}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-view">

    <div class="row">
        <!-- <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'University').' '. Html::encode($this->title) ?></h2>
        </div> -->
        <div class="col-sm-3 actionBtns">

            <?php
            if(Yii::$app->user->id == $model->responsible_id){
                echo  Html::a(Yii::t('backend', 'Update'), ['manager-update'], ['class' => 'btn btn-primary']);
            }else{
                echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);

            }
            ?>

        </div>
    </div>

    <div class="row">
<?php
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'title',
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

        'description:html',
        'detailed_address',
        'total_rating',
        'no_of_ratings',
        'recommended:boolean',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

    <div class="row">
<?php
if($providerUniversityCountries->totalCount){
    $gridColumnUniversityAccreditedCountries = [
        ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute' => 'country.title',
                'label' => Yii::t('backend', 'Country')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUniversityCountries,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-university-accredited-countries']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'University Accredited Countries')),
        ],
        'columns' => $gridColumnUniversityAccreditedCountries
    ]);
}
?>

    </div>

    <div class="row">
<?php
if($providerUniversityPhotos->totalCount){
    $gridColumnUniversityPhotos = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
        'name',

        //  'path',
            'base_url:url',
           // 'type',
         //   'size',
          //  'order',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUniversityPhotos,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-university-photos']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'University Photos')),
        ],
        'columns' => $gridColumnUniversityPhotos
    ]);
}
?>

    </div>

    <div class="row">
<?php
if($providerUniversityPrograms->totalCount){
    $gridColumnUniversityPrograms = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'title',
            [
                'attribute' => 'major.title',
                'label' => Yii::t('backend', 'Major')
            ],
            [
                'attribute' => 'degree.title',
                'label' => Yii::t('backend', 'Degree')
            ],
            [
                'attribute' => 'field.title',
                'label' => Yii::t('backend', 'Field')
            ],
            'country_id',
            'city_id',
            'study_start_date',
            'study_duration',
            'study_method',
            'attendance_type',
            'annual_cost',
            'conditional_admissions',
            'toefl',
            'ielts',
            'bank_statment',
            'high_school_transcript',
            'bachelor_degree',
            'certificate',
            'note1:ntext',
            'note2:ntext',
            'total_rating',
            'program_type',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUniversityPrograms,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-university-programs']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'University Programs')),
        ],
        'columns' => $gridColumnUniversityPrograms
    ]);
}
?>

    </div>

    <div class="row">
<?php
if($providerUniversityVideos->totalCount){
    $gridColumnUniversityVideos = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'path',
            'base_url:url',
            'type',
            'size',
            'name',
            'order',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUniversityVideos,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-university-videos']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'University Videos')),
        ],
        'columns' => $gridColumnUniversityVideos
    ]);
}
?>

    </div>

    <div class="row">
<?php
if($providerUnversityRating->totalCount){
    $gridColumnUnversityRating = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'user_id',
            'name',
            'comment:ntext',
            'rating',
            'status:boolean',
            'created_at',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUnversityRating,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unversity-rating']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('backend', 'Unversity Rating')),
        ],
        'columns' => $gridColumnUnversityRating
    ]);
}
?>

    </div>
</div>
