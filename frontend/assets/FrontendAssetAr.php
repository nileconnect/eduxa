<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class FrontendAssetAr extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web';

    /**
     * @var array
     */
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap',
        'https://fonts.googleapis.com/css?family=Raleway:500,600,700&display=swap',
        'css/style-reverse.css',
        'https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap',
        'css/custom.css',
        'css/customAr.css',
    ];

    /**
     * @var array
     */
    public $js = [
       // 'js/jquery-3.4.1.min.js',
        'js/app.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
      //  BootstrapAsset::class,
//        Html5shiv::class,
    ];
}
