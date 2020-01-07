<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourse */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-course-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'School Course').' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'school.title',
            'label' => Yii::t('backend', 'School'),
        ],
        'title',
        'information:ntext',
        'requirments:ntext',
        'course_start_every',
        'lessons_per_week',
        'hours_per_week',
        'min_no_of_students_per_class',
        'avg_no_of_students_per_class',
        'min_age',
        'required_level',
        'time_of_course:datetime',
        'registeration_fees',
        'cost_per_week',
        'no_of_weeks',
        'discount',
        'required_attendance_duraion',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Schools<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSchools = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'details',
        'featured',
        'location',
        'lat',
        'lng',
        'image_base_url',
        'image_path',
        'country_id',
        'city_id',
        'min_age',
        'max_students_per_class',
        'avg_students_per_class',
        'accomodation_fees',
        'registeration_fees',
        'study_books_fees',
        'discount',
        'no_of_ratings',
        'total_rating',
        'accomodation_reservation_fees',
        'has_health_insurance',
        'health_insurance_cost',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model->school,
        'attributes' => $gridColumnSchools    ]);
    ?>
</div>
