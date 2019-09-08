<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\City */

$this->title = Yii::t('app', 'Create City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index', 'countryId'=>$model->country_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
