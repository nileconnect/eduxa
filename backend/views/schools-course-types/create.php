<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolsCourseTypes */

$this->title = Yii::t('backend', 'Create Schools Course Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schools Course Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schools-course-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
