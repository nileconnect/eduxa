<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Faq */

$this->title = 'Create '. \backend\models\Country::findOne(Yii::$app->session->get('countryId'))->title . ' - '. Yii::t('app', 'Faq');
$this->params['breadcrumbs'][] = ['label' =>  \backend\models\Country::findOne(Yii::$app->session->get('countryId'))->title .' - Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
