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
<?=$this->render('_breadcrumb_section.php', ['data' => 'Shop']); ?>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <?= $this->render('_left-sidebar', ['categories' => $categories, 'tags' => $tags]); ?>
            <div class="col-lg-9 col-md-7">
                <?= $this->render('_product-content', ['products' => $products]); ?>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
