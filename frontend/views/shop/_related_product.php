<?php

use common\modules\product\models\Product;
use yii\helpers\Url;

/** @var Product[] $relatedProducts */
/** @var Product[] $bundleProducts */
?>
<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2><?= Yii::t('app', 'Related Products'); ?></h2>
                </div>
            </div>
        </div>

        <div class="row owl-carousel related_product_slider">
            <?php foreach ($relatedProducts as $relatedProduct): ?>
                <div class="col-lg-3 col-md-4 col-sm-6" style="max-width:100%">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= $relatedProduct->image ?? ''; ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <a href="<?= Url::to(['/shop/detail', 'slug' => $relatedProduct->slug ?? '']); ?>"><?= $relatedProduct->name ?? ''; ?></a>
                            </h6>
                            <h5><?= $relatedProduct->price ?? ''; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2><?= Yii::t('app', 'Related Products'); ?></h2>
                </div>
            </div>
        </div>

        <div class="row owl-carousel related_product_slider2">
            <?php foreach ($bundleProducts as $bundleProduct): ?>
            <div class="col-lg-3 col-md-4 col-sm-6" style="max-width:100%">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?= $bundleProduct->image ?? ''; ?>">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>
                            <a href="<?= Url::to(['/shop/detail', 'slug' => $bundleProduct->slug ?? '']); ?>"><?= $bundleProduct->name ?? ''; ?></a>
                        </h6>
                        <h5><?= $bundleProduct->price ?? ''; ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
