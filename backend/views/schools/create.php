<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Schools */

$this->title = Yii::t('backend', 'Create a new School');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schools-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
