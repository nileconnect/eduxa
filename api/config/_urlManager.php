<?php
return [
    //'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        ['pattern' => 'login', 'route' => 'site/login'],

        ['class' =>'yii\rest\UrlRule','controller'=>'profile'
            ,'only'=>['index','update','options']
            ,'extraPatterns'=>['GET view' => 'view' ]
            , 'pluralize'=>false
        ],


        ['class' =>'yii\rest\UrlRule','controller'=>['cities','districts','gender','stages','categories','accreditions','curriculum','companies']
            ,'only'=>['index','options']
            , 'pluralize'=>false
        ],


        ['class' =>'yii\rest\UrlRule','controller'=>'lookup'
            ,'only'=>['cities','districts','stages','categories','gender','accredition', 'options']
            ,'extraPatterns'=>[
                'GET cities' => 'cities' ,
                'GET districts' => 'districts' ,
            'GET stages' => 'stages' ,
            'GET categories' => 'categories' ,
            'GET gender' => 'gender' ,
            'GET accredition' => 'accredition' ,

            ]
            , 'pluralize'=>false
        ],


        ['class' => 'yii\rest\UrlRule', 'controller' => 'superior' ,'pluralize'=>false ,
            'only' => ['create','verify','validate','options'],
            'extraPatterns'=>[
                'POST create' => 'create',
                'POST verify' => 'verify',
                'POST validate' => 'validate',

            ]
        ],

        ['class' => 'yii\rest\UrlRule', 'controller' => 'survey' ,'pluralize'=>false ,
            'only' => ['answers','index','options'],
            'extraPatterns'=>[
                'POST answers' => 'answers',

            ]
        ],



    ]
];
