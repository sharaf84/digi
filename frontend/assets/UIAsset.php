<?php

/**
 * Metronic Admin Asset
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 * @copyright Copyright (c) 2015 Digitree
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class UIAsset extends AssetBundle {

    //public $sourcePath = '@frontThemePath';
    public $basePath = '@frontThemePath';
    public $baseUrl = '@frontThemeUrl';

    public $css = [
        'ui-deps/font-awesome/css/font-awesome.min.css',
        'ui-deps/swiper/dist/css/swiper.min.css',
        'ui-deps/animate.css/animate.min.css',
        //'css/build/app.css',
    ];

    public $js = [
        'ui-deps/modernizr/modernizr.js',
        'ui-deps/foundation/js/foundation.min.js',
        'ui-deps/swiper/dist/js/swiper.jquery.min.js',
        'ui-deps/skrollr/dist/skrollr.min.js',
        'ui-deps/jquery-number/jquery.number.min.js',
        'js/build/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];


}
