<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourseType */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'School Course Type',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Course Type'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="school-course-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
