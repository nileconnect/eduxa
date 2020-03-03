<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UniversityProgramMediumOfStudy */

$this->title = Yii::t('backend', 'Create Program Medium Of Study');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Program Medium Of Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-program-medium-of-study-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
