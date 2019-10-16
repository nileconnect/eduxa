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
    // ************  for all new subroles******************   //

    [
        'controllers' => ['sign-in','helper','site','file/storage'],
        'allow' => true,
        'roles' => ['universityManager'],
    ],



    //university Manager
    [
        'controllers' => ['university'],
        'allow' => true,
        'actions' => ['manager-view','manager-update'],

        'roles' => ['universityManager'],
    ],
    [
        'controllers' => ['manager-university-programs'],
        'allow' => true,
        'roles' => ['universityManager'],
    ],



];
?>