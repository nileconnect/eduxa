<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramMajors */

$this->title = Yii::t('backend', 'Create Program Majors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-program-majors-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
