<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cities */

$this->title = 'create '. \backend\models\State::findOne(Yii::$app->session->get('stateId'))->title . ' - '.Yii::t('backend', 'Cities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
