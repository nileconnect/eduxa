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
        'title',
        [
            'attribute' => 'courseType.title',
            'label' => Yii::t('backend', 'Course Type'),
        ],
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
        'discount',
        'total_rating',
        'status',
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
</div>
