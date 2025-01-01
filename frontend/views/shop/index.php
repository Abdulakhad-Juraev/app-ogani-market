<?php

/** @var Product[] $products */
/** @var Product[] $discountProducts */
/** @var Product $productsCount */
/** @var Category[] $categories */
/** @var \common\modules\blog\models\Tags[] $tags */

/** @var ActiveDataProvider $dataProvider */

use backend\models\Category;
use backend\models\Product;
use common\modules\blog\models\Tags;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

$products = $dataProvider->models;
?>
<?php $this->render('_breadcrumb_section.php'); ?>
<!-- Product Section Begin -->
<!--<section class="product spad">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            --><?php ////= $this->render('../category/_left-sidebar', ['categories' => $categories, 'tags' => $tags]); ?>
<!--            <div class="col-lg-9 col-md-7">-->
<!--                <div class="row">-->
<!--                    --><?php //foreach ($products as $product): ?>
<!--                        <div class="col-lg-4 col-md-6 col-sm-6">-->
<!--                            <div class="product__item">-->
<!--                                <div class="product__item__pic set-bg" data-setbg="--><?php //= $product->getImage() ?><!--">-->
<!--                                    <ul class="product__item__pic__hover">-->
<!--                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                        <li>-->
<!--                                            <a href="--><?php //= Url::to(['/cart/add-to-cart', 'id' => $product->id]) ?><!--"-->
<!--                                               class="addToCart">-->
<!--                                                <i class="fa fa-shopping-cart"></i>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                                <div class="product__item__text">-->
<!--                                    <h6>-->
<!--                                        <a href="--><?php //= Url::to(['/shop/detail', 'slug' => $product->slug]); ?><!--">--><?php //= $product->name; ?><!--</a>-->
<!--                                    </h6>-->
<!--                                    <h5>--><?php //= $product->price ?><!--</h5>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                </div>-->
<!---->
<!--                <div class="product__pagination">-->
<!--                    <style>-->
<!--                        .page-item .page-link {-->
<!--                            line-height: 1;-->
<!--                        }-->
<!---->
<!--                        .page-item.active .page-link {-->
<!--                            background-color: #7fad39;-->
<!--                            border-color: #7fad39;-->
<!--                        }-->
<!--                    </style>-->
<!--                    --><?php
//                    // display pagination
//                    echo LinkPager::widget([
//                        'pagination' => $dataProvider->pagination,
//                        'maxButtonCount' => 3,
//                    ]);
//
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Product Section End -->

<?php
// display pagination
//echo LinkPager::widget([
//    'pagination' => $,
//    'maxButtonCount' => 5
//]);

?>
<!--=================================================================================================================-->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <?= $this->render('../category/_left-sidebar', ['categories' => $categories, 'tags' => $tags]); ?>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
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
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
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
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span><?= $productsCount ?? 0; ?></span> <?= Yii::t('app', 'Products found'); ?>
                                </h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= $product->image ?? '' ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
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
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
