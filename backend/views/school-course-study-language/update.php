<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourseStudyLanguage */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'School Course Study Language',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Course Study Language'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="school-course-study-language-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
