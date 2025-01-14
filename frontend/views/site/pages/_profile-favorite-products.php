<?php

use common\modules\product\models\UserProducts;
use yii\helpers\Url;

/** @var UserProducts $userProducts */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Sevimli mahsulotlar royhati</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th>Mahsulot</th>
                        <th>Rasm</th>
                        <th style="width: 10%">Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($userProducts as $index => $userProduct): ?>
                        <tr>
                            <td><?= $index + 1; ?> .</td>
                            <td>
                                <a href="<?= Url::to(['/shop/detail', 'slug' => $userProduct->product->slug ?? '']) ?>"><?= $userProduct->product->name ?? ''; ?></a>
                            </td>
                            <td>
                                <img src="<?= $userProduct->product->image ?? ''; ?>"
                                     style="width:30px; height:30px;" alt="">
                            </td>
                            <td><span class="badge bg-warning add-like-btn-hover"
                                      data-id="<?= $userProduct->product_id ?? 'null' ?>"
                                      data-user-id="<?= Yii::$app->user->isGuest ? 'null' : Yii::$app->user->identity->id ?>">
                                                                     <i class="fa fa-heart add-like-btn"
                                                                        style="color:<?= $userProduct->product->is_liked ? 'red' : '#1c1c1c'; ?>"></i>
                                                                </span></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>