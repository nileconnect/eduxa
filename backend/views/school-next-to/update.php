<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolNextTo */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'School Next To',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Next To'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="school-next-to-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
