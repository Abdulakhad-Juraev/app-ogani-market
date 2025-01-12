<?php

use common\modules\product\models\Product;
use yii\helpers\Url;
/** @var Product[] $products */
?>
<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="<?= $product->image ?? '' ?>">
                    <ul class="product__item__pic__hover">
                        <li>
                            <a href="#" class="add-like-btn-hover"
                               data-id="<?= $product->id ?>"
                               data-user-id="<?= Yii::$app->user->isGuest ? 'null' : Yii::$app->user->identity->id ?>">

                                <i class="fa fa-heart add-like-btn"
                                   style="color:<?= $product->is_liked ? 'red' : '#1c1c1c'; ?>"></i>
                            </a>
                        </li>
<!--                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
                        <li>
                            <a href="<?= Url::to(['/cart/add-to-cart', 'id' => $product->id ?? '']) ?>"
                               class="addToCart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>
                        <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug ?? '']); ?>"><?= $product->name ?? ''; ?></a>
                    </h6>
                    <h5><?= $product->price ?? '' ?></h5>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>