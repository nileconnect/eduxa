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
        'https://unpkg.com/vue-select@latest/dist/vue-select.css'
    ];

    /**
     * @var array
     */
    public $js = [
       'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
       'https://unpkg.com/vue-select@3.0.0',
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
