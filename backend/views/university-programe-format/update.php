<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameFormat */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Program Format',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Format'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-programe-format-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
