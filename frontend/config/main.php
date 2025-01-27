<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'uz',
    'homeUrl' => '/',
    'controllerNamespace' => 'frontend\controllers',

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'class' => 'common\components\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/',
            'rules' => [


                // SITE ACTIONS
                '' => 'site/index',
                'contact' => 'site/contact',
                'profile/' => 'site/profile',

                // BLOG PAGE
                'blog/' => 'blog/index',
                'blog/blog-detail/<slug>' => 'blog/blog-detail',
                'blog/blog-category/<id>' => 'blog/blog-category',
                'blog/blog-tags/<id>' => 'blog/blog-tags',

                // SHOP PAGE
                'shop/' => 'shop/index',
                'shop/detail/<slug>' => 'shop/detail',
                'shop/category/<id>' => 'shop/category',
                'discount/' => 'shop/discount',
            ],
        ],

    ],
    'params' => $params,
];
