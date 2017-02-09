<?php

Yii::setAlias('@blog', dirname(__DIR__) . '/blog');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$controllerMap = require(__DIR__ . '/controller_map.php');

$config = [
    'id' => 'simple_blog',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => '/post/showList',
    'language' => 'ru-RU',
    'components' => [
        'request' => [
            'cookieValidationKey' => md5($db['username'] . $db['password']),
        ],
        'user' => [
            'identityClass' => 'blog\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/blog/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'base/showError',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        
        'i18n' => [
            'translations' => [
                'post' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@blog/base/messages',
                ],
                'category' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@blog/base/messages',
                ],
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@blog/base/messages',
                ],
                'comment' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@blog/base/messages',
                ],
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@blog/base/messages',
                ],
            ],
        ],
    ],
    'controllerMap' => $controllerMap,
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
