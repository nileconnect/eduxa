<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramDegree */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Program Degree',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Degree'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-program-degree-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
