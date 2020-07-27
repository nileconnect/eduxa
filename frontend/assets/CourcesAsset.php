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
class CourcesAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web';

    /**
     * @var array
     */
    public $css = [
        'https://unpkg.com/vue-select@latest/dist/vue-select.css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css',
    ];

    /**
     * @var array
     */
    public $js = [
       'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
       'https://unpkg.com/vue-select@3.0.0',
       'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
    //    'js/Apps/VideoCaro.js',
       'js/Apps/Api.js',
       'js/Apps/CourcesApp.js'
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
