<?php

use \yii\web\Request;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'TSS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'treemanager' => [
            'class' => 'kartik\tree\Module',
        // other module settings, refer detailed documentation
        ],
        'comment' => [
            'class' => 'yii2mod\comments\Module'
        ],
        'sitemap' => [
            'class' => 'himiklab\sitemap\Sitemap',
            'models' => [
                // your models
                'common\models\custom\Category',
                'common\models\custom\Brand',
                'common\models\custom\Product',
                'common\models\custom\Article',
                'common\models\custom\Page',
            ],
            'urls' => [
                // your additional urls
                [
                    'loc' => 'http://www.tssegypt.com/',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.1,
                ],
                [
                    'loc' => 'http://www.tssegypt.com/signup',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_NEVER,
                    'priority' => 0.6,
                ],
                [
                    'loc' => 'http://www.tssegypt.com/forgot-password',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_NEVER,
                    'priority' => 0.6,
                ],
            ],
            'enableGzip' => true, // default is false
            'cacheExpire' => 3600, // 1 second. Default is 24 hours
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'class' => 'digi\web\User',
            'identityClass' => 'common\models\custom\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/#login',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            //'class' => 'webvimark\behaviors\multilanguage\MultiLanguageUrlManager', // \webvimark\behaviors\multilanguage\MultiLanguageUrlManager::className(),
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // multilanguage rules
                //'<_c:[\w \-]+>/<id:\d+>' => '<_c>/view',
                //'<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>' => '<_c>/<_a>',
                //'<_c:[\w \-]+>/<_a:[\w \-]+>' => '<_c>/<_a>',//Make confiflect with cutome routes
                //'<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>' => '<_m>/<_c>/<_a>',
                //'<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                //Sitemap rule
                ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
                // custom rules
                'store' => 'store/search',
                'store/search' => 'store/search',
                'store/<slug:\S+>' => 'store/search',
                //'category/<slug:\S+>' => 'store/search',
                //'brand/<slug:\S+>' => 'store/search',
                'product/<slug:\S+>' => 'store/product',
                'article/<slug:\S+>' => 'articles/view',
                'signup' => 'user/signup',
                'login' => 'user/login',
                'logout' => 'user/logout',
                'forgot-password' => 'user/request-password-reset',
                '<slug:(about-us|terms-of-service|privacy-policy)>' => 'site/page',
                'contact-us' => 'site/contact-us',
            ],
        ],
        'metaTags' => [
            'class' => 'digi\metaTags\MetaTagsComponent',
            'generateCsrf' => false,
            'generateOg' => true,
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '1626098720985743',
                    'clientSecret' => 'ecce3605a9255ed248ca9a4095c606f3',
                    'scope' => 'email, public_profile'
                ],
            ],
        ],
    ],
    'params' => $params,
];
