<?php

use backend\models\Product;
use yii\helpers\Url;

/** @var Product[] $product */
/** @var Product[] $relatedProducts */

?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Vegetable’s Package</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <a href="./index.html">Vegetables</a>
                        <span>Vegetable’s Package</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                             src="<?= $product->getImage(); ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <?php foreach ($product->getBehavior('galleryBehavior')->getImages() as $image): ?>
                            <img data-imgbigurl="<?= $image->getUrl('medium') ?>" src="<?= $image->getUrl('medium') ?>"
                                 alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product->name; ?></h3>
                    <div class="product__details__rating">
                        <?

                        for ($i = 0; $i < $product->start_count; $i++) {
                            echo '<i class="fa fa-star"></i>';
                        }
                        ?>
                        <!--                        <i class="fa fa-star-half-o"></i>-->
                    </div>
                    <div class="product__details__price"><?= $product->price; ?></div>
                    <p><?= $product->description; ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="<?= Url::to(['/cart/add-to-cart', 'id' => $product->id]) ?>" class="primary-btn addToCart">ADD TO CARD</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span><?= $product->is_stock ? 'In Stock' : 'No Stock'; ?></span></li>
                        <!--                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>-->
                        <!--                        <li><b>Weight</b> <span>0.5 kg</span></li>-->
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                               aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                               aria-selected="false">Reviews <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Description</h6>
                                <p><?= $product->description; ?></p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Information</h6>
                                <p><?= $product->info; ?></p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Reviews</h6>
                                <p><?= $product->reviews; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->
<?= $this->render('_related_product', ['relatedProducts' => $relatedProducts]); ?>

