<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolFacilities */

$this->title = Yii::t('backend', 'Create School Facilities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Facilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-facilities-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
