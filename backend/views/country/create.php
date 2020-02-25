<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Country */

$this->title = Yii::t('backend', 'Create Country');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Country'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
