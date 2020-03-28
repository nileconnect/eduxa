<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolRoomCategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'School Room Category',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Room Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="school-room-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
