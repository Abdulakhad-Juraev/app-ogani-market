<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'TestComponent' => [
            'class' => 'common\components\TestComponent'
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'forceTranslation' => true,
                    //'enableCaching' => false,
                    //'cachingDuration' => 3600,
                ]
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],

    'on beforeAction' => function ($event) {
        if (Yii::$app instanceof \yii\web\Application) {
            \common\components\LanguageHelper::setLanguage();
        }
    }
];
