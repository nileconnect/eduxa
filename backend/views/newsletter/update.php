<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Newsletter */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Newsletter',
]) . ' ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Newsletter'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="newsletter-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
