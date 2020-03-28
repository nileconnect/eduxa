<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SchoolRoomCategory */

$this->title = Yii::t('backend', 'Create School Room Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'School Room Category'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-room-category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
