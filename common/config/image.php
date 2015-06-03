<?php

/**
 * Image config file
 * controlles all image sizes and manipulations using yii\imagine\Image class
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 */
use Yii;

return [
    'placeholders' => [
        'default' => ['path' => Yii::getAlias('@sharedUrl') . '/images/placeholders/', 'filename' => 'placeholder.png'],
        'person' => ['path' =>  Yii::getAlias('@sharedUrl') . '/images/placeholders/', 'filename' => 'person-placeholder.png'],
    ],
    'sizes' => [
        'micro' => ['thumbnail', 50, 50],
        'home-slider' => ['thumbnail', 1231, 673],
        'home-product' => ['thumbnail', 207, 395],
        'home-article' => ['thumbnail', 220, 307],
        'slide-article' => ['thumbnail', 303, 197],
    ]
];
