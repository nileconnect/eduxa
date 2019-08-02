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

    <?= Html::a(Yii::t('backend', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
    <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ])
    ?>


<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'slug',
        'school_identity_number',
        'city_id',
        [
            'attribute' => 'district.title',
            'label' => Yii::t('backend', 'District'),
        ],
        'stage',
        'gender',
        'category',
        'email:email',
        'admin_name',
        'admin_phone',
        'admin_email:email',
        'supervisor_phone',
        'owner_name',
        'owner_phone',
        'owner_identity',
        'owner_gender',
        'owner_email:email',
        'nour_rep_phone',
        'owner_id',
        'lock',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
 
<h4>District<?= ' '. Html::encode($this->title) ?></h4>
 
    <?php 
    $gridColumnDistrict = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'city.title',
            'label' => Yii::t('backend', 'City'),
        ],
        'title',
        'slug',
    ];
    echo DetailView::widget([
        'model' => $model->district,
        'attributes' => $gridColumnDistrict    ]);
    ?>
<h4>SchoolsProfile<?= ' '. Html::encode($this->title) ?></h4>

    <?php 
    $gridColumnSchoolsProfile = [
        'institution_year',
        'no_of_classes',
        'no_students_boys',
        'no_students_girls',
        'address',
        'phone',
        'phone_2',
        'mobile',
        'mobile_2',
        'mailbox',
        'email:email',
        'website',
        'facebook',
        'youtube',
        'twitter',
        'instagram',
    ];
    echo DetailView::widget([
        'model' => $model->schoolsProfile,
        'attributes' => $gridColumnSchoolsProfile    ]);
    ?>
</div>
