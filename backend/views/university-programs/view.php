<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityPrograms */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-programs-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'University Programs').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'university.title',
            'label' => Yii::t('backend', 'University'),
        ],
        'title',
        [
            'attribute' => 'major.title',
            'label' => Yii::t('backend', 'Major'),
        ],
        [
            'attribute' => 'degree.title',
            'label' => Yii::t('backend', 'Degree'),
        ],
        [
            'attribute' => 'field.title',
            'label' => Yii::t('backend', 'Field'),
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>University<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversity = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'image_base_url',
        'image_path',
        'description',
        'detailed_address',
        [
            'attribute' => 'country.title',
            'label' => Yii::t('backend', 'Country'),
        ],
        [
            'attribute' => 'city.title',
            'label' => Yii::t('backend', 'City'),
        ],
        'location',
        'lat',
        'lng',
        'total_rating',
        'no_of_ratings',
        'recommended',
        'responsible_id',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model->university,
        'attributes' => $gridColumnUniversity    ]);
    ?>
    <div class="row">
        <h4>UniversityProgramMajors<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversityProgramMajors = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model->major,
        'attributes' => $gridColumnUniversityProgramMajors    ]);
    ?>
    <div class="row">
        <h4>UniversityProgramField<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversityProgramField = [
        ['attribute' => 'id', 'visible' => false],
        'title',
    ];
    echo DetailView::widget([
        'model' => $model->field,
        'attributes' => $gridColumnUniversityProgramField    ]);
    ?>
    <div class="row">
        <h4>UniversityProgramDegree<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversityProgramDegree = [
        ['attribute' => 'id', 'visible' => false],
        'title',
    ];
    echo DetailView::widget([
        'model' => $model->degree,
        'attributes' => $gridColumnUniversityProgramDegree    ]);
    ?>
</div>
