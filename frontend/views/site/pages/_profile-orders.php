<?php

use common\modules\order\model\Order;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

/** @var Order $orders */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h4 class="card-title w-100 d-flex justify-content-between align-items-center" style="font-size:23px;">
                        <span>
                            <i class="fas fa-globe"></i>
                            Online market,Inc.
                        </span>
                    <small class="float-right">Date:
                        <?= Yii::$app->formatter->asDatetime($orders[0]->created_at, 'php:Y-m-d') ?? '' ?>
                    </small>
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Mahsulot</th>
                        <th>Rasm</th>
                        <th>Soni</th>
                        <th>Narxi</th>
                        <th>Summa</th>
                        <th>Tolov turi</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <style>
                        .order-block-row:hover {
                            transform: scaleX(1.01);
                            box-shadow: 0 0 5px 1px #a4a4a4 !important;
                        }
                    </style>
                    <?php $all_sum = 0; ?>
                    <?php foreach ($orders as $order): ?>
                        <tr class="order-block-row">
                            <td colspan="2"><b>Zakaz id <?= $order->id ?? '' ?> </b></td>
                            <td>
                            </td>
                            <td><b>summa</b></td>
                            <td colspan="3">
                                <b><?= $order->allPrice ?? '' ?></b>
                            </td>
                            <td>
                                <b><?= Yii::$app->formatter->asDatetime($order->created_at, 'php:Y-m-d') ?? '' ?></b>
                            </td>
                        </tr>
                        <?php foreach ($order->orderItems as $index => $item): ?>
                            <tr>
                                <td><?= $index + 1 ?? '' ?></td>
                                <td>
                                    <a href="<?= Url::to(['/shop/detail', 'slug' => $item->product->slug ?? '']) ?>"><?= $item->product->name ?? ''; ?></a>
                                </td>
                                <td><img src="<?= $item->product->image ?? ''; ?>"
                                         style="width:30px; height:30px;" alt=""></td>
                                <td><?= $item->count ?? '' ?></td>
                                <td><?= $item->price ?? '' ?></td>
                                <td><?= $item->total_price ?? '' ?></td>
                                <td><?= $order->paymentTypeName ?? '' ?></td>
                                <th>
                                    <a href="<?= Url::to(['/site/profile-update', 'product_id' => $item->product->id]) ?>"
                                       class="btn badge badge-warning comment-btn"
                                       data-product-name="<?= $item->product->name ?? '' ?>"><i
                                                class="far fa-comments"></i></a>
                            </tr>
                        <?php endforeach; ?>
                        <?php $all_sum += $order->allPrice; ?>

                    <?php endforeach; ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td class="pt-5 pb-3">Total:</td>
                        <td colspan="2" class="pt-5 pb-3"><b><u><?= $all_sum ?? ''; ?></u></b></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>
<!-- Button trigger modal -->
<?php Modal::begin(['title' => '', 'id' => 'ajax-modal-frontend-order-comments']); ?>
<div id="ajax-modal-frontend-order-comments-content"></div>
<?php Modal::end(); ?>
