<?php
return [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'cache' => require(__DIR__ . '/_cache.php'),
    ],
    'params' => [
         'bsVersion' => '4.x', // this will set globally `bsVersion` to Bootstrap 4.x for all Krajee Extensions
    ],
];
