<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameMethodOfStudy */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Program Method Of Study',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Method Of Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-programe-method-of-study-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
