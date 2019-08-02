<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Schools */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Schools',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="schools-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
