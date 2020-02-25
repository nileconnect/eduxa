<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\State */

$this->title = Yii::t('app', 'Update State').': '. $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index', 'countryId'=>$model->country_id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="city-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
