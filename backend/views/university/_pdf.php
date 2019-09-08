<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\University */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'University').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'image_base_url:url',
        'image_path',
        'description:ntext',
        'detailed_address',
        'location',
        'lat',
        'lng',
        'total_rating',
        'no_of_ratings',
        'recommended',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerUniversityAccreditedCountries->totalCount){
    $gridColumnUniversityAccreditedCountries = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'country.title',
                'label' => Yii::t('backend', 'Country')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUniversityAccreditedCountries,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('backend', 'University Accredited Countries')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
                'path',
        'base_url:url',
        'type',
        'size',
        'name',
        'order',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUniversityPhotos,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('backend', 'University Photos')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('backend', 'University Programs')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('backend', 'University Videos')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'status',
        'ceated_at',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUnversityRating,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('backend', 'Unversity Rating')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUnversityRating
    ]);
}
?>
    </div>
</div>
