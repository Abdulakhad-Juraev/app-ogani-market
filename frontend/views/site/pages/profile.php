<?php

use common\modules\auth\models\User;
use common\modules\auth\models\UserContact;
use common\modules\order\model\Order;
use common\modules\product\models\UserProducts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var UserContact $contact */
/** @var UserProducts $userProducts */
/** @var Order $orders */
/** @var User $user */

$userContact = Yii::$app->user->identity->userContact ?? null;
?>
<!--    <link rel="stylesheet"-->
<!--          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
<!--    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">-->
<!--    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">-->

<div class="container wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= Url::to(['/site/index']); ?>">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center"><img class="profile-user-img img-fluid img-circle"
                                                          src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                                          alt="User profile picture"></div>
                            <h3 class="profile-username text-center"><?= $userContact->firstname ?? ''; ?> <?= $userContact->lastname ?? ''; ?></h3>
                            <p class="text-muted text-center"><?= $userContact->user->username ?? ''; ?></p>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body"><strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                            <p class="text-muted"> <?= $userContact->phone ?? ''; ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?= $userContact->address ?? ''; ?></p>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">

                                <li class="nav-item"><a class="nav-link " href="#settings"
                                                        data-toggle="tab">Settings</a>
                                </li>
                                <li class="nav-item"><a class="nav-link active" href="#orders"
                                                        data-toggle="tab">Buyurtmalar</a>
                                </li>

                                <li class="nav-item"><a class="nav-link " href="#favorite_products"
                                                        data-toggle="tab">Sevimli tovarlarim</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="settings">
                                    <?= $this->render('_profile-settings', ['user' => $user,'contact'=>$contact]); ?>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane active" id="orders">
                                    <?= $this->render('_profile-orders', ['orders' => $orders,'userProducts' => $userProducts]); ?>
                                </div>
                                <div class="tab-pane" id="favorite_products">
                                    <?= $this->render('_profile-favorite-products', ['userProducts' => $userProducts]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>