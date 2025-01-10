<?php

use backend\models\Category;
use common\modules\product\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;


/** @var Category[] $categories */
/** @var Product[] $products */
/** @var Product $productsCount */
/** @var Product[] $discountProducts */
/** @var ActiveDataProvider $dataProvider */

$products = $dataProvider->models;
?>
<?php $this->render('_breadcrumb_section.php'); ?>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <?= $this->render('_left-sidebar', ['categories' => $categories]); ?>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                            <?php foreach ($products as $product): ?>
                                <?php dd($products);?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="<?= $product->image ?? '' ?>">
                                            <div class="product__discount__percent">
                                                -<?= $product->superCategory->assignDiscountSuperCategory->discount->percentage ?? '' ?>
                                                %
                                            </div>
                                            <ul class="product__item__pic__hover">
                                                <li>
                                                    <a href="#" class="add-like-btn-hover"
                                                       data-id="<?= $product->id ?>"
                                                       data-user-id="<?= Yii::$app->user->isGuest ? 'null' : Yii::$app->user->identity->id ?>">

                                                        <i class="fa fa-heart add-like-btn"
                                                           style="color:<?= $product->is_liked ? 'red' : '#1c1c1c'; ?>"></i>
                                                    </a>
                                                </li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li>
                                                    <a href="<?= Url::to(['/cart/add-to-cart', 'id' => $product->id ?? '']) ?>"
                                                       class="addToCart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?= $product->superCategory->name ?? '' ?></span>
                                            <h5>
                                                <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug]); ?>"><?= $product->name ?? '' ?></a>
                                            </h5>
                                            <div class="product__item__price"><?= $product->price ?? '' ?>
                                                <span><?= $product->discount_price ?? '' ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
