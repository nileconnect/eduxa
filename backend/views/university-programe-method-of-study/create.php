<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgrameMethodOfStudy */

$this->title = Yii::t('backend', 'Create Program Method Of Study');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Method Of Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-programe-method-of-study-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
