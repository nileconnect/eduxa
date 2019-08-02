<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\City */

$this->title = Yii::t('backend', 'Create City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'City'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
