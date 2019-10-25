<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolsCourseTypes */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Schools Course Types',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schools Course Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="schools-course-types-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
