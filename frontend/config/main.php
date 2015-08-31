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
        ]
    ],
    'components' => [
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
                'article/<slug:\S+>' => 'articles/view',
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
