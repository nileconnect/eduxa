<?php
return [
    [
        'controllers' => ['sign-in'],
        'allow' => true,
        'roles' => ['?'],
        'actions' => ['login'],
    ],
    [
        'controllers' => ['sign-in'],
        'allow' => true,
        'roles' => ['@'],
        'actions' => ['logout'],
    ],
    [
        'controllers' => ['site'],
        'allow' => true,
        'roles' => ['?', '@'],
        'actions' => ['error'],
    ],
    [
        'controllers' => ['debug/default'],
        'allow' => true,
        'roles' => ['?'],
    ],
    [
        'controllers' => ['user'],
        'allow' => true,
        'roles' => ['administrator','manager'],
    ],
    [
        'controllers' => ['user'],
        'allow' => false,
    ],
       [
        'allow' => true,
        'roles' => ['manager', 'administrator'],
    ],





];
?>