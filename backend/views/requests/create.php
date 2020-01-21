<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Requests */

$this->title = Yii::t('backend', 'Create Requests');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
