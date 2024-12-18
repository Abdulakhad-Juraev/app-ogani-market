<?php

/** @var Product $products */

/** @var ActiveDataProvider $dataProvider */

use backend\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;

$products = $dataProvider->models;
?>
<?php $this->render('_breadcrumb_section.php'); ?>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <?= $this->render('../category/_left-sidebar'); ?>
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        <? foreach ($products as $product): ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= $product->getImage() ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="<?= Url::to(['/cart/add-to-cart', 'id' => $product->id]) ?>" class="addToCart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>
                                            <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug]); ?>"><?= $product->name; ?></a>
                                        </h6>
                                        <h5><?= $product->price ?></h5>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>

                    <div class="product__pagination">
                        <style>
                            .page-item .page-link{
                                line-height: 1;
                            }
                            .page-item.active .page-link {
                                background-color: #7fad39;
                                border-color: #7fad39;
                            }
                        </style>
                        <?php
                        // display pagination
                        echo LinkPager::widget([
                            'pagination' => $dataProvider->pagination,
                            'maxButtonCount'=>3,
                        ]);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

<?
// display pagination
//echo LinkPager::widget([
//    'pagination' => $,
//    'maxButtonCount' => 5
//]);

?>