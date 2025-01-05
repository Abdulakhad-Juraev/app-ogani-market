<?php

use common\modules\order\model\Order;
use yii\bootstrap5\Modal;
use yii\helpers\Url;

/** @var Order $orders */
?>

    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ml-0">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> Online market,
                                            Inc.
                                            <small class="float-right">Date:
                                                <?= Yii::$app->formatter->asDatetime($orders[0]->created_at, 'php:Y-m-d') ?? '' ?>
                                            </small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Mahsulot</th>
                                                <th>Soni</th>
                                                <th>Narxi</th>
                                                <th>Summa</th>
                                                <th>Tolov turi</th>
                                                <th>Comment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $all_sum = 0; ?>
                                            <?php foreach ($orders as $order): ?>
                                                <?php foreach ($order->orderItems as $item): ?>
                                                    <tr>
                                                        <td><?= $item->product->name ?? '' ?></td>
                                                        <td><?= $item->count ?? '' ?></td>
                                                        <td><?= $item->price ?? '' ?></td>
                                                        <td><?= $item->total_price ?? '' ?></td>
                                                        <td><?= $order->paymentTypeName ?? '' ?></td>
                                                        <th>
                                                        <a href="<?= Url::to(['/site/profile-update', 'product_id' => $item->product->id]) ?>"
                                                           class="btn badge badge-warning comment-btn" data-product-name="<?= $item->product->name ?? '' ?>"><i class="far fa-comments"></i></a>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php $all_sum += $order->allPrice; ?>
                                                <tr>
                                                    <td><b>Zakaz id <?= $order->id ?? '' ?> </b></td>
                                                    <td></td>
                                                    <td>
                                                        <b><?= Yii::$app->formatter->asDatetime($order->created_at, 'php:Y-m-d') ?? '' ?></b>
                                                    </td>
                                                    <td><b>Summa</b></td>
                                                    <th></th>
                                                    <td>
                                                        <b><?= $order->allPrice ?? '' ?></b>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row mt-3">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td><b><?= $all_sum ?? ''; ?></b>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div id="sidebar-overlay"></div>
    </div>

<?php Modal::begin(['title' => '', 'id' => 'ajax-modal-frontend-order-comments']); ?>
    <div id="ajax-modal-frontend-order-comments-content"></div>
<?php Modal::end(); ?>
