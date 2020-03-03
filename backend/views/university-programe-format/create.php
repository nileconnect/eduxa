<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameFormat */

$this->title = Yii::t('backend', 'Create Program Format');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Format'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-programe-format-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
