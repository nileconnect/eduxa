<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourse */

$this->title = Yii::t('backend', 'Add New Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-course-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
