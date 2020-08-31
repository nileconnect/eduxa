<?php

use common\models\User;
use backend\widgets\Menu;

echo Menu::widget([
    'options' => ['class' => 'sidebar-menu tree', 'data' => ['widget' => 'tree']],
    'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
    'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
    'activateParents' => true,
    'items' => [
        [
            'label' => Yii::t('backend', 'Main'),
            'options' => ['class' => 'header'],
            'visible' => Yii::$app->user->identity->checkPermmissions('users') ,
        ],

        [
            'label' => Yii::t('backend', 'Users'),
            'url' => '#',
            'icon' => '<i class="fa fa-users"></i>',
            'options' => ['class' => 'treeview'],
            'visible' => Yii::$app->user->identity->checkPermmissions('users') ,
            'items' => [

                [
                    'label' => Yii::t('backend', 'Managers'),
                    'icon' => '<i class="fa fa-user-secret"></i>',
                    'url' => ['/user/index?user_role=manager'],
                    'active' => (Yii::$app->controller->id == 'user' && $_REQUEST['user_role'] == 'manager'),
                    'visible' => (Yii::$app->user->can('administrator')),
                ],

                [
                    'label' => Yii::t('backend', 'University Manager'),
                    'icon' => '<i class="fa fa-user-circle-o"></i>',
                    'url' => ['/user/index?user_role=universityManager'],
                    'active' => (Yii::$app->controller->id == 'user' && $_REQUEST['user_role'] == 'universityManager'),
                    // 'visible' => (Yii::$app->user->can('administrator')  ),
                ],

                [
                    'label' => Yii::t('backend', 'Referral - Person'),
                    'icon' => '<i class="fa fa-user"></i>',
                    'url' => ['/user/index?user_role=referralPerson'],
                    'active' => (Yii::$app->controller->id == 'user' && $_REQUEST['user_role'] == 'referralPerson'),
                    // 'visible' => (Yii::$app->user->can('administrator')  ),
                ],

                [
                    'label' => Yii::t('backend', 'Referral - Company'),
                    'icon' => '<i class="fa fa-user"></i>',
                    'url' => ['/user/index?user_role=referralCompany'],
                    'active' => (Yii::$app->controller->id == 'user' && $_REQUEST['user_role'] == 'referralCompany'),
                    // 'visible' => (Yii::$app->user->can('administrator')  ),
                ],

                [
                    'label' => Yii::t('backend', 'Students'),
                    'icon' => '<i class="fa fa-user"></i>',
                    'url' => ['/user/index?user_role=user'],
                    'active' => (Yii::$app->controller->id == 'user' && $_REQUEST['user_role'] == 'user'),
                    // 'visible' => (Yii::$app->user->can('administrator')  ),
                ],

            ],
        ],

        [
            'label' => Yii::t('backend', 'Manage Universities'),
            'url' => '#',
            'icon' => '<i class="fa fa-university"></i>',
            'options' => ['class' => 'treeview'],
            'visible' => Yii::$app->user->identity->checkPermmissions('universities') ,
            'items' => [

                [
                    'label' => Yii::t('backend', 'University'),
                    'icon' => '<i class="fa fa-university"></i>',
                    'url' => ['/university'],
                    'active' => (Yii::$app->controller->id == 'university' && Yii::$app->controller->action->id == 'index'),
                ],

                [
                    'label' => Yii::t('backend', 'University Media'),
                    'icon' => '<i class="fa fa-file-image-o"></i>',
                    'url' => ['/university/media'],
                    'active' => (Yii::$app->controller->id == 'university' && Yii::$app->controller->action->id == 'media'),
                ],

                [
                    'label' => Yii::t('backend', 'University Lookups'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-mortar-board"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        [
                            'label' => Yii::t('backend', 'University Next To'),
                            'icon' => '<i class="fa fa-university"></i>',
                            'url' => ['/university-next-to'],
                            'active' => (Yii::$app->controller->id == 'university-next-to'),
                        ],
                    ],
                ],


                [
                    'label' => Yii::t('backend', 'Programs Lookups'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-mortar-board"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        [
                            'label' => Yii::t('backend', 'Degree'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-program-degree'],
                            'active' => (Yii::$app->controller->id == 'university-program-degree'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Majors'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-program-majors'],
                            'active' => (Yii::$app->controller->id == 'university-program-majors'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Fields'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-program-field'],
                            'active' => (Yii::$app->controller->id == 'university-program-field'),
                        ],

                        [
                            'label' => Yii::t('backend', 'Medium of study'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-program-medium-of-study'],
                            'active' => (Yii::$app->controller->id == 'university-program-medium-of-study'),
                        ],

                        [
                            'label' => Yii::t('backend', 'Language of study'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-lang-of-study'],
                            'active' => (Yii::$app->controller->id == 'university-lang-of-study'),
                        ],

                        [
                            'label' => Yii::t('backend', 'Conditional admission'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-programe-conditional-admission'],
                            'active' => (Yii::$app->controller->id == 'university-programe-conditional-admission'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Format'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-programe-format'],
                            'active' => (Yii::$app->controller->id == 'university-programe-format'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Method of Study'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-programe-method-of-study'],
                            'active' => (Yii::$app->controller->id == 'university-programe-method-of-study'),
                        ],
                        [
                            'label' => Yii::t('backend', 'ILETS'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/university-programe-ilets'],
                            'active' => (Yii::$app->controller->id == 'university-programe-ilets'),
                        ],
                    ],
                ],

            ],
        ],

        [
            'label' => Yii::t('backend', 'Manage Schools'),
            'url' => '#',
            'icon' => '<i class="fa fa-building-o"></i>',
            'options' => ['class' => 'treeview'],
            'visible' => Yii::$app->user->identity->checkPermmissions('schools') ,
            'items' => [

                [
                    'label' => Yii::t('backend', 'Schools'),
                    'icon' => '<i class="fa fa-building-o"></i>',
                    'url' => ['/schools'],
                    'active' => (Yii::$app->controller->id == 'schools' && Yii::$app->controller->action->id == 'index'),
                ],
                [
                    'label' => Yii::t('backend', 'Schools Media'),
                    'icon' => '<i class="fa fa-file-image-o"></i>',
                    'url' => ['/schools/media'],
                    'active' => (Yii::$app->controller->id == 'schools' && Yii::$app->controller->action->id == 'media'),
                ],

                [
                    'label' => Yii::t('backend', 'School Lookups'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-mortar-board"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        [
                            'label' => Yii::t('backend', 'Schools room category'),
                            'icon' => '<i class="fa fa-building-o"></i>',
                            'url' => ['/school-room-category'],
                            'active' => (Yii::$app->controller->id == 'school-room-category'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Schools Next To'),
                            'icon' => '<i class="fa fa-building-o"></i>',
                            'url' => ['/school-next-to'],
                            'active' => (Yii::$app->controller->id == 'school-next-to'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Schools facilities'),
                            'icon' => '<i class="fa fa-building-o"></i>',
                            'url' => ['/school-facilities'],
                            'active' => (Yii::$app->controller->id == 'school-facilities'),
                        ],
                    ],
                ],



//                [
                //                    'label' => Yii::t('backend', 'school Course Tyes'),
                //                    'icon' => '<i class="fa fa-users"></i>',
                //                    'url' => ['/schools-course-types'],
                //                    'active' => (Yii::$app->controller->id == 'schools-course-types'),
                //                ],
                [
                    'label' => Yii::t('backend', 'Course Lookups'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-mortar-board"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        [
                            'label' => Yii::t('backend', 'Course Type'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/school-course-type'],
                            'active' => (Yii::$app->controller->id == 'school-course-type'),
                        ],
                        [
                            'label' => Yii::t('backend', 'Study Language'),
                            'icon' => '<i class="fa fa-mortar-board"></i>',
                            'url' => ['/school-course-study-language'],
                            'active' => (Yii::$app->controller->id == 'school-course-study-language'),
                        ],
                    ],
                ],
            ],
        ],

        [
            'label' => Yii::t('backend', 'Requests'),
            'options' => ['class' => 'header'],
            'visible' => Yii::$app->user->identity->checkPermmissions('requests') ,
        ],

        [
            'label' => Yii::t('backend', 'Manage Requests'),
            'icon' => '<i class="fa fa-tv"></i>',
            'url' => ['/requests'],
            'active' => (Yii::$app->controller->id == 'requests'),
            'visible' => Yii::$app->user->identity->checkPermmissions('requests') ,

            //'visible' => (Yii::$app->user->can('administrator')  ),
        ],

        [
            'label' => Yii::t('backend', 'Reports'),
            'url' => '#',
            'icon' => '<i class="fa fa-building-o"></i>',
            'options' => ['class' => 'treeview'],
            'visible' => Yii::$app->user->identity->checkPermmissions('reports'),
            'items' => [
                [
                    'label' => Yii::t('backend', 'General statistics'),
                    'icon' => '<i class="fa fa-building-o"></i>',
                    'url' => ['/reports/general'],
                    'active' => (Yii::$app->controller->id == 'reports' && Yii::$app->controller->action->id == 'general'),
                    // 'visible' => (Yii::$app->user->can('administrator')),
                ],
                [
                    'label' => Yii::t('backend', 'Users'),
                    'icon' => '<i class="fa fa-building-o"></i>',
                    'url' => ['/reports/users'],
                    'active' => (Yii::$app->controller->id == 'reports' && Yii::$app->controller->action->id == 'users'),
                    // 'visible' => (Yii::$app->user->can('administrator')),
                ],
                [
                    'label' => Yii::t('backend', 'Requests'),
                    'icon' => '<i class="fa fa-building-o"></i>',
                    'url' => ['/reports/requests'],
                    'active' => (Yii::$app->controller->id == 'reports' && Yii::$app->controller->action->id == 'requests'),
                    // 'visible' => (Yii::$app->user->can('administrator')),
                ],

            ],
        ],

        [
            'label' => Yii::t('backend', 'Content'),
            'options' => ['class' => 'header'],
            'visible' => Yii::$app->user->identity->checkPermmissions('countries') ||  Yii::$app->user->identity->checkPermmissions('static_pages') 
                || Yii::$app->user->identity->checkPermmissions('newsletter') || Yii::$app->user->identity->checkPermmissions('settings') ,
        ],
        [
            'label' => Yii::t('backend', 'Countries'),
            'url' => ['/country/index'],
            'icon' => '<i class="fa fa-globe"></i>',
            'active' => Yii::$app->controller->id === 'country',
            'visible' => Yii::$app->user->identity->checkPermmissions('countries') ,

        ],

        [
            'label' => Yii::t('backend', 'Static pages'),
            'url' => ['/content/page/index'],
            'icon' => '<i class="fa fa-file-o"></i>',
            'active' => Yii::$app->controller->id === 'page',
            'visible' => (Yii::$app->user->can('administrator')),
            'visible' => Yii::$app->user->identity->checkPermmissions('static_pages') ,
        ],

    //    [
        //            'label' => Yii::t('backend', 'Articles'),
        //            'url' => '#',
        //            'icon' => '<i class="fa fa-files-o"></i>',
        //            'options' => ['class' => 'treeview'],
        //            'visible' => (Yii::$app->user->can('administrator')  ),
        //
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
        [
            'label' => Yii::t('backend', 'Newsletter'),
            'url' => ['/newsletter/index'],
            'icon' => '<i class="fa fa-file-o"></i>',
            'active' => (Yii::$app->controller->id == 'newsletter'),
            'visible' => Yii::$app->user->identity->checkPermmissions('newsletter') ,

        ],
        [
            'label' => Yii::t('backend', 'Settings'),
            'url' => ['/system/key-storage/index'],
            'icon' => '<i class="fa fa-cogs"></i>',
            'active' => (Yii::$app->controller->id == 'key-storage'),
            'visible' => Yii::$app->user->identity->checkPermmissions('settings') ,

        ],

    //    [
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
])?>
