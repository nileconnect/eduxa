<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameConditionalAdmission */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Program Conditional Admission',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Conditional Admission'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-programe-conditional-admission-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
