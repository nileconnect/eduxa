<?php


use backend\assets\BackendAsset;
use backend\modules\system\models\SystemLog;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\log\Logger;
use yii\widgets\Breadcrumbs;


echo Menu::widget([
    'options' => ['class' => 'sidebar-menu tree', 'data' => ['widget' => 'tree']],
    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
    'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
    'activateParents' => true,
    'items' => [
        [
            'label' => Yii::t('backend', 'Main'),
            'options' => ['class' => 'header'],
        ],

        [
            'label' => Yii::t('backend', 'Manage University'),
            'url' => ['/university/manager-view'],
            'icon' => '<i class="fa fa-thumb-tack"></i>',
            'active' => Yii::$app->controller->id === 'university',
        ],

        [
            'label' => Yii::t('backend', 'Manage Programs'),
            'url' => ['/manager-university-programs'],
            'icon' => '<i class="fa fa-thumb-tack"></i>',
            'active' => Yii::$app->controller->id === 'manager-university-programs',
        ],






    ],
]) ?>