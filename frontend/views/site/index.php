<?php

use backend\models\Category;
use common\modules\blog\models\Blog;
use common\modules\product\models\Product;
use yii\helpers\Url;

/** @var Category $categories */
/** @var Category $recCategories */
/** @var Product $products */
/** @var Blog $blogs */

?>
<!-- Categories Section Begin -->
<?php //= $this->render('template/_category', ['categories' => $categories]); ?>

<!-- Featured Section Begin -->
<?= $this->render('template/_featured-product', ['recCategories' => $recCategories, 'products' => $products]); ?>

<!-- Banner Begin -->
<?php //= $this->render('template/_banner'); ?>

<!-- Latest Product Section Begin -->
<?= $this->render('template/_latest-product'); ?>

<!-- Blog Section Begin -->
<?php //= $this->render('template/_blog',['blogs'=>$blogs]); ?>
<div id="viewed-products-section">
    <!-- Viewed products AJAX orqali yuklanadi -->
</div>
