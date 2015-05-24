<?php
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'class' => \webvimark\behaviors\multilanguage\MultiLanguageUrlManager::className(),
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<_c:[\w \-]+>/<id:\d+>' => '<_c>/view',
                '<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>' => '<_c>/<_a>',
                '<_c:[\w \-]+>/<_a:[\w \-]+>' => '<_c>/<_a>',
                '<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
            ],
        ]
    ],
    'params' => $params,
];
