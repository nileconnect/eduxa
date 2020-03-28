<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolFacilities */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'School Facilities',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Facilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="school-facilities-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
