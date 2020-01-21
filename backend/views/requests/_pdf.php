<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Requests */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('backend', 'Requests').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'model_name',
        'model_id',
        'model_parent_id',
        'request_by_role',
        'student_id',
        [
                'attribute' => 'requester.username',
                'label' => Yii::t('backend', 'Requester')
            ],
        'request_notes:ntext',
        'admin_notes:ntext',
        'student_first_name',
        'student_last_name',
        'student_gender',
        'student_email:email',
        'student_mobile',
        [
                'attribute' => 'studentCountry.title',
                'label' => Yii::t('backend', 'Student Country')
            ],
        [
                'attribute' => 'studentCity.title',
                'label' => Yii::t('backend', 'Student City')
            ],
        'student_nationality_id',
        'accomodation_option',
        'accomodation_option_cost',
        'airport_pickup',
        'airport_pickup_cost',
        'course_start_date',
        'number_of_weeks',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
