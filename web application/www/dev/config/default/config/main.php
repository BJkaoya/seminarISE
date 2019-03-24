<?php

$params = array_merge(
    require __DIR__ . '/params.php'
);

return [
    'timeZone' => 'Asia/Shanghai',
    'id' => 'dev',
    'basePath' => dirname(__DIR__, 3),
    'vendorPath' => YII_LIB_DIR . '/vendor',
    'name' => '',
    'language' => 'zh-CN',
    'controllerNamespace' => 'dev\controllers',
    'bootstrap' => ['log'],
    'modules' => require 'modules.php',
    'components' => [
        'request' => [
            'enableCookieValidation' => true,
            'enableCsrfValidation' => false,
            'csrfParam' => '_csrf-dev',
        ],
        'user' => [
            'identityClass' => 'dev\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-dev',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the dev
            'name' => 'advanced-dev',
            'cookieParams' => [
                'httpOnly' => false,
                'lifetime' => 0
            ],

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
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => true,
            'rules' => [
                //'class' => 'yii\rest\UrlRule',
                //'controller' => ['site']
            ],
        ]

    ],
    'params' => $params,
];
