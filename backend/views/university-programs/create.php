<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityPrograms */

$this->title = Yii::t('backend', 'Create University Program');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-programs-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
