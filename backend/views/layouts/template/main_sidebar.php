<?php

use yii\helpers\Url;
use yii\web\View;

/** @var View $this */

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/']) ?>" class="brand-link">
        <img src="/admin/adminLte3/dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/admin/adminLte3/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Url::to(['/']) ?>" class="d-block text-capitalize "><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <?= $this->render('_sidebar_menu') ?>
    </div>
    <!-- /.sidebar -->
</aside>