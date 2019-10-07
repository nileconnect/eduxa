<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FaqCat */

$this->title = Yii::t('app', 'Create Faq Cat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faq Cats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-cat-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
