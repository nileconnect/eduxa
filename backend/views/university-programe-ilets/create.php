<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameIlets */

$this->title = Yii::t('backend', 'Create Program Ilets');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Ilets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-programe-ilets-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
