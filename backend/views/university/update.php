<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\University */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'University',
]) . ' ' . $model->title;

if(Yii::$app->user->id == $model->responsible_id){

    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['manager-view']];
}else{

    $this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
}

$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="university-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
