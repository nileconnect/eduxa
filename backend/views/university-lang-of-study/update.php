<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UniversityLangOfStudy */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'University Lang Of Study',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Lang Of Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-lang-of-study-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
