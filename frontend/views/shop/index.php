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
                    <style>
                        /* Default style for the after pseudo-element */
                        .section-title h2:after {
                            position: absolute;
                            left: 0;
                            bottom: -15px;
                            right: 0;
                            height: 4px;
                            width: 80px;
                            background: #7fad39;
                            content: "";
                            margin: 0 auto;
                        }

                        /* For the .product__discount__title h2 */
                        .product__discount__title h2:after {
                            margin: 0;
                            transition:all .3s;
                            width: 0; /* Makes it take the full width by default */
                        }

                        /* Hover effect on the h2 */
                        .product__discount__title h2:hover:after {
                            width: 100%; /* Expands width to 300px on hover */
                        }

                    </style>
                    <div class="section-title product__discount__title">
                        <a href="<?= Url::to(['/shop/discount']) ?>">
                            <h2>Sale Off</h2>
                        </a>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php foreach ($discountProducts as $product): ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="<?= $product->image ?? '' ?>">
                                            <div class="product__discount__percent">
                                                -<?= $product->superCategory->assignDiscountSuperCategory->discount->percentage ?? '' ?>
                                                %
                                            </div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart" ></i></a></li>
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
                <div class="filter__item">
                </div>
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= $product->image ?? '' ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart" style="color:<?= $product->is_liked ? 'red' : 'yellow'; ?>"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
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
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
