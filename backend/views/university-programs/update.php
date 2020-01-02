<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityPrograms */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'University Program',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-programs-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
