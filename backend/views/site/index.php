<?php

/** @var yii\web\View $this */

//$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <img src="/frontend/web/template/img/logo.png" class="fa fa-spinner fast-spin">
    </div>
</div>

<?php

use common\modules\blog\models\Blog;
use common\modules\order\model\Order;
use common\modules\product\models\Product;
use common\modules\product\models\SuperCategory;
use yii\web\View;

/* @var $this View */

//$this->title = 'Панель управления';

$user = Yii::$app->user;

?>

<?= '' //$this->render('_info_box')               ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?= "<h2 class='ml-2'>" . $this->title . "</h2>";
            $products = Product::find()->count();
            $categories = SuperCategory::find()->count();
            $order = Order::find()->count();
            $blog = Blog::find()->count();
             ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="card card-success  ">
                                <div class="card-header">
                                    <h3 class="card-title">Продукты</h3>

                                    <div class="card-tools">


                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    Количество продуктов <?= $products; ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="card card-danger  ">
                                <div class="card-header">
                                    <h3 class="card-title">Категории</h3>

                                    <div class="card-tools">

                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    Количество категорий <?= $categories; ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-3">
                            <div class="card card-primary  ">
                                <div class="card-header">
                                    <h3 class="card-title">Заказы</h3>

                                    <div class="card-tools">


                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    Количество заказов <?= $order; ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-3">
                            <div class="card card-warning  ">
                                <div class="card-header">
                                    <h3 class="card-title">Блоги</h3>

                                    <div class="card-tools">


                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    Количество блогов <?= $blog ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
