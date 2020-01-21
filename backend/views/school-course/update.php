<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourse */

$this->title = Yii::t('backend', 'Update Course: ') . ' - ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="school-course-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
