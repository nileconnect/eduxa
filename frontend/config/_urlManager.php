<?php

use Sitemaped\Sitemap;

return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        // Pages
        ['pattern' => 'page/<slug>', 'route' => 'page/view'],
        ['pattern' => 'how-we-work', 'route' => 'page/how-we-work'],
        ['pattern' => 'about', 'route' => 'page/about'],
        ['pattern' => 'contact', 'route' => 'page/contact'],
        ['pattern' => 'terms', 'route' => 'page/terms'],
        ['pattern' => 'privacy', 'route' => 'page/privacy'],



        // Articles
        ['pattern' => 'referral-signup', 'route' => 'user/sign-in/referral-signup'],
        ['pattern' => 'referral-company', 'route' => 'user/sign-in/referral-company'],

        ['pattern' => 'login', 'route' => 'user/sign-in/login'],
        ['pattern' => 'signup', 'route' => 'user/sign-in/signup'],
        ['pattern' => 'logout', 'route' => 'user/sign-in/logout'],
        ['pattern' => 'reset-password', 'route' => 'user/sign-in/request-password-reset'],

        //universities
        ['pattern' => 'universities/country/<slug>', 'route' => 'universities/country'],
        ['pattern' => 'university/<slug>', 'route' => 'universities/view'],

        //universities programs
        ['pattern' => 'university/program/<slug>', 'route' => 'universities/program'],
        ['pattern' => 'program-apply/<slug>', 'route' => 'universities/program-apply'],


        //Schools
        ['pattern' => 'school/country/<slug>', 'route' => 'schools/country'],
        ['pattern' => 'school/<slug>', 'route' => 'schools/view'],
        //school courses
        ['pattern' => 'school/course/<slug>', 'route' => 'schools/course'],



        //dashboard
        ['pattern' => 'dashboard/requests/<slug>', 'route' => 'dashboard/requests'],
        ['pattern' => 'dashboard/cancel-request/<slug>', 'route' => 'dashboard/cancel-request'],
        ['pattern' => 'dashboard/cancel-course-request/<slug>', 'route' => 'dashboard/cancel-course-request'],


        ['pattern' => 'referral-dashboard/cancel-request/<slug>', 'route' => 'referral-dashboard/cancel-request'],



        ['pattern' => 'article/attachment-download', 'route' => 'article/attachment-download'],
        ['pattern' => 'article/<slug>', 'route' => 'article/view'],

    ]
];
