<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '6uhFApHJrwki41kanJewl9ncdeokjFJ1',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        /*
        'urlManager'=>[
            'enablePrettyUrl' => true,
            'showScriptName'=>false,
            'rules'=>[
            ''=>'site/index',
            '<module:\w+>/<controller:\w+>' => '<module>/<controller>/view',
                                            即：访问 module/controller实际为 module/controller/view即 module为模块,controller为控制器名称，view为控制器中的方法
            '<controller:\w+>/<action:\w+>/<name:\w+>/<item:\w+>/<id:\d+>'=>'<controller>/<action>',
                                           即:访问controller/action/name/item/3,实际为 controller/action&name=name&item=item&id=3
            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',         
              //  '<controller:\w+>/<action:\w+>/<name:\w+>/<item:\w+>/<id:\d+>'=>'<controller>/<action>',
             // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            //'<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
            // 'cate/test' => 'index.php?r=cate/test',
            // '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
            ],
        ],
        */
        'urlManager'=>[
            'enablePrettyUrl' => true,
            'showScriptName'=>false,
            'rules'=>[
                ''=>'site/index',
               // '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<name:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<name:\w+>/<item:\w+>/<id:\d+>'=>'<controller>/<action>',
               '<controller:\w+>/<action:\w+>/<id:\d+>/<name:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //  '<controller:\w+>/<action:\w+>/<name:\w+>/<item:\w+>/<id:\d+>'=>'<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //'<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
        // 'cate/test' => 'index.php?r=cate/test',
        ],
        ],
    ],
    
    
    /*
    'modules'=>[
        'article'=>'app\modules\article\Article',
        'comment'=>'app\modules\comment\Comment',
        
    ],
    */
    'modules'=>[
        'article'=>'app\modules\article\Article',
        'comment'=>'app\modules\comment\Comment',
    ],
    // 'catchAll'=>['site/index'], 维护页面时
    'controllerMap' => ['accout'=>'app\controllers\UserController'],
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
