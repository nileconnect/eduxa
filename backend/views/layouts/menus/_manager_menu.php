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

//        [
//            'label' => Yii::t('backend', 'Users'),
//            'url' => '#',
//            'icon' => '<i class="fa fa-users"></i>',
//            'options' => ['class' => 'treeview'],
//            'items' => [
//
//                [
//                    'label' => Yii::t('backend', 'Managers'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/user/index?user_role=manager'],
//                    'active' => (Yii::$app->controller->id == 'user'),
//                    'visible' => (Yii::$app->user->can('administrator') or  Yii::$app->user->can('manager') ),
//                ],
//
//                [
//                    'label' => Yii::t('backend', 'Users'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/user/index?user_role=user'],
//                    'active' => (Yii::$app->controller->id == 'user'),
//                    'visible' => (Yii::$app->user->can('administrator') or  Yii::$app->user->can('manager') ),
//                ],
//
//                [
//                    'label' => Yii::t('backend', 'Referral - Person'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/user/index?user_role=referralPerson'],
//                    'active' => (Yii::$app->controller->id == 'user'),
//                    'visible' => (Yii::$app->user->can('administrator') or  Yii::$app->user->can('manager') ),
//                ],
//
//
//
//
//                [
//                    'label' => Yii::t('backend', 'Referral - Company'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/user/index?user_role=referralCompany'],
//                    'active' => (Yii::$app->controller->id == 'user'),
//                    'visible' => (Yii::$app->user->can('administrator') or  Yii::$app->user->can('manager') ),
//                ],
//
//                [
//                    'label' => Yii::t('backend', 'University Manager'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/user/index?user_role=universityManager'],
//                    'active' => (Yii::$app->controller->id == 'user'),
//                    'visible' => (Yii::$app->user->can('administrator') or  Yii::$app->user->can('manager') ),
//                ],
//
//
//
//
//            ],
//        ],

        [
            'label' => Yii::t('backend', 'Universities'),
            'url' => '#',
            'icon' => '<i class="fa fa-users"></i>',
            'options' => ['class' => 'treeview'],
            'items' => [

                [
                    'label' => Yii::t('backend', 'University'),
                    'icon' => '<i class="fa fa-users"></i>',
                    'url' => ['/university'],
                    'active' => (Yii::$app->controller->id == 'university'),
                ],

                [
                    'label' => Yii::t('backend', 'Program Degree'),
                    'icon' => '<i class="fa fa-users"></i>',
                    'url' => ['/university-program-degree'],
                    'active' => (Yii::$app->controller->id == 'university-program-degree'),
                ],

                [
                    'label' => Yii::t('backend', 'Program Majors'),
                    'icon' => '<i class="fa fa-users"></i>',
                    'url' => ['/university-program-majors'],
                    'active' => (Yii::$app->controller->id == 'university-program-majors'),
                ],


                [
                    'label' => Yii::t('backend', 'Program Fields'),
                    'icon' => '<i class="fa fa-users"></i>',
                    'url' => ['/university-program-field'],
                    'active' => (Yii::$app->controller->id == 'university-program-field'),
                ],


            ],
       ],

        [
            'label' => Yii::t('backend', 'Language Schools'),
            'url' => '#',
            'icon' => '<i class="fa fa-users"></i>',
            'options' => ['class' => 'treeview'],
            'items' => [

                [
                    'label' => Yii::t('backend', 'Schools'),
                    'icon' => '<i class="fa fa-users"></i>',
                    'url' => ['/schools'],
                    'active' => (Yii::$app->controller->id == 'schools'),
                ],

                [
                    'label' => Yii::t('backend', 'school Course Tyes'),
                    'icon' => '<i class="fa fa-users"></i>',
                    'url' => ['/schools-course-types'],
                    'active' => (Yii::$app->controller->id == 'schools-course-types'),
                ],
            ],
        ],

//        [
//            'label' => Yii::t('backend', 'Content'),
//            'options' => ['class' => 'header'],
//        ],
//        [
//            'label' => Yii::t('backend', 'Countries'),
//            'url' => ['/country/index'],
//            'icon' => '<i class="fa fa-thumb-tack"></i>',
//            'active' => Yii::$app->controller->id === 'country',
//        ],
//
//        [
//            'label' => Yii::t('backend', 'Static pages'),
//            'url' => ['/content/page/index'],
//            'icon' => '<i class="fa fa-thumb-tack"></i>',
//            'active' => Yii::$app->controller->id === 'page',
//        ],
//
//        [
//            'label' => Yii::t('backend', 'Faqs'),
//            'url' => '#',
//            'icon' => '<i class="fa fa-users"></i>',
//            'options' => ['class' => 'treeview'],
//            'items' => [
//
//                [
//                    'label' => Yii::t('backend', 'Faq categories'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/faq-cat'],
//                    'active' => (Yii::$app->controller->id == 'faq-cat'),
//                ],
//
//                [
//                    'label' => Yii::t('backend', 'Faq'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/faq'],
//                    'active' => (Yii::$app->controller->id == 'faq'),
//                ],
//            ],
//        ],
//
//
//        [
//            'label' => Yii::t('backend', 'Articles'),
//            'url' => '#',
//            'icon' => '<i class="fa fa-files-o"></i>',
//            'options' => ['class' => 'treeview'],
//            'active' => 'content' === Yii::$app->controller->module->id &&
//                ('article' === Yii::$app->controller->id || 'category' === Yii::$app->controller->id),
//            'items' => [
//                [
//                    'label' => Yii::t('backend', 'Articles'),
//                    'url' => ['/content/article/index'],
//                    'icon' => '<i class="fa fa-file-o"></i>',
//                    'active' => Yii::$app->controller->id === 'article',
//                ],
//                [
//                    'label' => Yii::t('backend', 'Categories'),
//                    'url' => ['/content/category/index'],
//                    'icon' => '<i class="fa fa-folder-open-o"></i>',
//                    'active' => Yii::$app->controller->id === 'category',
//                ],
//            ],
//        ],

//        [
//            'label' => Yii::t('backend', 'Settings'),
//            'url' => '#',
//            'icon' => '<i class="fa fa-users"></i>',
//            'options' => ['class' => 'treeview'],
//            'items' => [
//
//                [
//                    'label' => Yii::t('backend', 'Countries'),
//                    'icon' => '<i class="fa fa-users"></i>',
//                    'url' => ['/country'],
//                    'active' => (Yii::$app->controller->id == 'country'),
//                    'visible' => (Yii::$app->user->can('administrator') or  Yii::$app->user->can('manager') ),
//                ],
//
//                ]
//            ],

//        [
//            'label' => Yii::t('backend', 'Key-Value Storage'),
//            'url' => ['/system/key-storage/index'],
//            'icon' => '<i class="fa fa-arrows-h"></i>',
//            'active' => (Yii::$app->controller->id == 'key-storage'),
//        ],
//        [
//            'label' => Yii::t('backend', 'Cache'),
//            'url' => ['/system/cache/index'],
//            'icon' => '<i class="fa fa-refresh"></i>',
//        ],
//
//        [
//            'label' => Yii::t('backend', 'Logs'),
//            'url' => ['/system/log/index'],
//            'icon' => '<i class="fa fa-warning"></i>',
//            'badge' => SystemLog::find()->count(),
//            'badgeBgClass' => 'label-danger',
//        ],
    ],
]) ?>