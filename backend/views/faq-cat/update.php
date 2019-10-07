<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqCat */

$this->title = Yii::t('app', 'Update Faq Cat:') .$model->title ;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faq Cats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="faq-cat-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
