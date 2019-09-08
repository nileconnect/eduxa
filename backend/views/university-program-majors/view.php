<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramMajors */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Program Majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-program-majors-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'University Program Majors').' '. Html::encode($this->title) ?></h2>
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
        'title',
        //'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerUniversityPrograms->totalCount){
    $gridColumnUniversityPrograms = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'university.title',
                'label' => Yii::t('backend', 'University')
            ],
            'title',
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
        'export' => false,
        'columns' => $gridColumnUniversityPrograms
    ]);
}
?>

    </div>
</div>
