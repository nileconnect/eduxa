<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolCourseStudyLanguage */

$this->title = Yii::t('backend', 'Create School Course Study Language');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Course Study Language'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-course-study-language-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
