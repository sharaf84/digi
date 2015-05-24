<?php

/**
 * Main backend assets
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 * @copyright Copyright (c) 2015 Digitree
 */

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/ui.css',
        'css/dev.css',
    ];
    public $js = [
        'js/ui.js',
        'js/dev.js',
    ];
//    public $depends = [
//        'digi\metronic\AdminAsset',
//    ];

}
