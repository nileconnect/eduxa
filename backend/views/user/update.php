<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $roles yii\rbac\Role[] */

$this->title = Yii::t('backend', 'Update') . ' -' . $model->username;
$this->params['breadcrumbs'][] = ['label' =>\common\models\User::UserRoleName( Yii::$app->session->get('UserRole') ).'s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->email, 'url' => ['view', 'id' => $model->username]];
$this->params['breadcrumbs'][] = ['label'=>Yii::t('backend', 'Update')];
?>
<div class="user-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'data' => $data,
        'profile' => $profile,
        'roles' => $roles
    ]) ?>

</div>
