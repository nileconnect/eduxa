<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramField */

$this->title = Yii::t('backend', 'Create Program Field');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Field'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-program-field-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
