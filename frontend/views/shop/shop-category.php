<?php

/** @var Tags[] $tags */
/** @var Category[] $categories */
/** @var Product[] $products */
/** @var Product $productsCount */
/** @var Product[] $discountProducts */
/** @var ActiveDataProvider $dataProvider */

use backend\models\Category;
use common\modules\blog\models\Tags;
use common\modules\product\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
$products = $dataProvider->models;
?>
<?php $this->render('_breadcrumb_section.php'); ?>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <?= $this->render('_left-sidebar', ['categories' => $categories, 'tags' => $tags]); ?>
            <div class="col-lg-9 col-md-7">
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
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
