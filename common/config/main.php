<?php

Yii::setAlias('root', dirname(dirname(__DIR__)) . '/');
Yii::setAlias('sharedPath', dirname(dirname(__DIR__)) . '/shared');
Yii::setAlias('sharedUrl', '/shared');

return [
    'language' => 'en',
    'aliases' => [
        '@digi' => '@common/digisoft/digi',
        '@digi/metronic' => '@common/digisoft/digi-metronic',
        '@digi/fancybox' => '@common/digisoft/digi-fancybox',
        '@digi/sortable' => '@common/digisoft/digi-sortable',
        '@digi/metaTags' => '@common/digisoft/digi-meta-tags',
        '@uploadPath' => '@sharedPath/uploads',
        '@uploadUrl' => '@sharedUrl/uploads',
        '@metronicPath' => '@sharedPath/themes/metronic',
        '@metronicUrl' => '@sharedUrl/themes/metronic',
        '@frontThemePath' => '@sharedPath/themes/frontend',
        '@frontThemeUrl' => '@sharedUrl/themes/frontend',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
    ],
];
