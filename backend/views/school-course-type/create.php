<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourseType */

$this->title = Yii::t('backend', 'Create School Course Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Course Type'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-course-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
