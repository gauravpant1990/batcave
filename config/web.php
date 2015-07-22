<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'name' => '6 figures',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
		'urlManager' => [
			  'showScriptName' => false,
			  'enablePrettyUrl' => true
        ],   
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'tpgiVN2Eeuh-vafd8NJW07lpGJtaGPJe',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
		'kdhUser' => [
			'class' => 'app\models\KdhUser',
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
		'authClientCollection' => [
			'class' => 'yii\authclient\Collection',
			'clients' => [
				'linkedin' => [
					'class' => 'yii\authclient\clients\LinkedIn',
					'clientId' => '750f0hg4dgw4kx',
					'clientSecret' => 'E33E3a10FeqkmVZu',
					'accessToken' => [
						'class'=>'yii\authclient\OAuthToken',
						'token'=>'863e0522-b6fd-4084-bb76-02d427efc641',
						'tokenSecret'=>'ae62cd43-b2c4-45d9-bbd6-0dbb26c589f5',
					],
					//'authUrl' => 'https://www.linkedin.com/uas/oauth/authorize',
					//'returnUrl' => 'http://localhost/site/auth',
				],
				// etc.
			],
		],
		/*'response' => [
			'format' => yii\web\Response::FORMAT_JSON,
			'charset' => 'UTF-8',
		]*/
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
