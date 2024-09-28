<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <!--       Spinner-->
            <div class="spinner-wrapper">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
    <!--       Spinner-->
    <?= $this->render('template/_navbar') ?>
    <?= $this->render('template/main_sidebar') ?>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= Html::encode($this->title) ?></h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                               <?=$this->render('template/_breadcrumbs')?>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div>
            </section>
        </div>
    </div>
    <?= $this->render('template/_footer') ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->















    <?php
    $js = <<<JS

            $(document).ready(function () {
            bsCustomFileInput.init();
            });


            const spinnerWrapper = document.querySelector('.spinner-wrapper');

            window.addEventListener('load',()=>{
    spinnerWrapper.style.opacity='0';


    setTimeout(()=>{
    spinnerWrapper.style.display='none';
    },200)
    })


    JS;

    $this->registerJs($js);

    ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
