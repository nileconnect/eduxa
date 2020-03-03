<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramMediumOfStudy */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Program Medium Of Study',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Medium Of Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-program-medium-of-study-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
