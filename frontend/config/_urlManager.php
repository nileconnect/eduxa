<?php

use Sitemaped\Sitemap;

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        // Pages
        ['pattern' => 'page/<slug>', 'route' => 'page/view'],

        // Articles
        ['pattern' => 'referral-signup', 'route' => 'user/sign-in/referral-signup'],

        ['pattern' => 'login', 'route' => 'user/sign-in/login'],
        ['pattern' => 'signup', 'route' => 'user/sign-in/signup'],
        ['pattern' => 'logout', 'route' => 'user/sign-in/logout'],
        ['pattern' => 'reset-password', 'route' => 'user/sign-in/request-password-reset'],

        //universities
        ['pattern' => 'universities/country/<slug>', 'route' => 'universities/country'],


        ['pattern' => 'article/attachment-download', 'route' => 'article/attachment-download'],
        ['pattern' => 'article/<slug>', 'route' => 'article/view'],

    ]
];
