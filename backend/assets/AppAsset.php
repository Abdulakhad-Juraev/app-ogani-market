<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'adminLte3/fontawesome-free/css/all.min.css',
        'adminLte3/ionicons/ionicons.min.css',
        'adminLte3/dist/css/adminlte.min.css',
        'adminLte3/icheck-bootstrap/icheck-bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
        'adminLte3/dist/css/main.css',
    ];
    public $js = [
        'adminLte3/bootstrap/js/bootstrap.bundle.min.js',
        'adminLte3/bs-custom-file-input/bs-custom-file-input.min.js',
        'adminLte3/dist/js/adminlte.min.js',
        'adminLte3/dist/js/demo.js',
        'adminLte3/dist/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
