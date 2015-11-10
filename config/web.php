<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'name'=>'SageOne',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'language' => 'pt_BR',
	'sourceLanguage' => 'pt_BR',
    'aliases' => [
                   '@upload' => '@app/upload/',

               ],
   
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'RPZHZLCvDiFpmPm4sRGra9ehznngy-f2',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		
	 
	    'user' => [
	           'identityClass' => 'app\models\User',
	           'enableAutoLogin' => true,
	           'identityCookie' => [
	               'name' => '_sageoneid', // unique for backend
	                   'path'=>'/basic/web'  // correct path for the backend app.
	               ]
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
	    'urlManager' => [
	               'enablePrettyUrl' => true,
	               'showScriptName' => false,
	               'rules' => [
	               ],
	           ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
       // 'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*'],
		
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*'],
		
    ];
}

return $config;
