<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityLangOfStudy */

$this->title = Yii::t('backend', 'Create University Medium of instructions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'University Medium of instructions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-lang-of-study-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
