<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityNextTo */

$this->title = Yii::t('backend', 'Create University Next To');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Next To'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-next-to-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
