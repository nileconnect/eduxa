<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cities */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Cities',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cities-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
