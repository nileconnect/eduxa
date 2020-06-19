<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramDegree */

$this->title = Yii::t('backend', 'Create Program Degree');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Degree'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-program-degree-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
