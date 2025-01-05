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
                                                <th>Action</th>
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
                                                               class="btn btn-primary comment-btn">comment</a></th>
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

<?php Modal::begin(['title' => $this->title, 'id' => 'ajax-modal-frontend']); ?>
    <div id="ajax-modal-content-frontend"></div>
<?php Modal::end(); ?>

<!--<div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content" id="ajax-modal-content">-->
<!--             AJAX kontent shu yerga yuklanadi-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->




<?php Modal::begin(['title' => $this->title, 'id' => 'ajax-modal-frontend-new']); ?>
<div id="ajax-modal-content-frontend-new"></div>
<?php Modal::end(); ?>
<!-- Modal structure -->
<div id="comment-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="comment-form">
                    <input type="hidden" name="id" id="comment-id">
                    <div class="form-group">
                        <label for="comment-text">Comment</label>
                        <textarea id="comment-text" name="comment" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
