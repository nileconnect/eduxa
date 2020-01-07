<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use backend\models\SchoolCourse;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourse */

$this->title = $model->school->title .'  - Courses  - ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-course-view">

    <div class="row">

        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?
//             Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
//                'class' => 'btn btn-danger',
//                'data' => [
//                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
//                    'method' => 'post',
//                ],
//            ])
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
        'status:boolean',

        [
            'attribute'=>'required_level',
            'format'=>'raw',
            'value'=>function($model){
                return  SchoolCourse::ListLevels()[$model->required_level];
            },
        ],
        [
            'attribute'=>'course_start_every',
            'format'=>'raw',
            'value'=>function($model){
                return  MyWeekDays()[$model->course_start_every];
            },
        ],
        'lessons_per_week',
        'hours_per_week',
        'min_no_of_students_per_class',
        'avg_no_of_students_per_class',
        'min_age',
        'time_of_course:datetime',
        'registeration_fees',
        'cost_per_week',
        'no_of_weeks',
        'discount',
        'required_attendance_duraion',
        'information:ntext',
        'requirments:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

</div>
