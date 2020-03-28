<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolNextTo */

$this->title = Yii::t('backend', 'Create School Next To');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Next To'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-next-to-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
