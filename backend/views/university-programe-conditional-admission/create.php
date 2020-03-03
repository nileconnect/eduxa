<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameConditionalAdmission */

$this->title = Yii::t('backend', 'Create Program Conditional Admission');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Conditional Admission'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-programe-conditional-admission-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
