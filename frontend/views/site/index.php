<?php

use backend\models\Category;
use common\modules\blog\models\Blog;
use common\modules\product\models\Product;

/** @var Category $categories */
/** @var Category $recCategories */
/** @var \common\modules\product\models\Product $products */
/** @var Blog $blogs */

?>
    <!-- Categories Section Begin -->
<?= $this->render('template/_category', ['categories' => $categories]); ?>

    <!-- Featured Section Begin -->
<?= $this->render('template/_featured-product', ['recCategories' => $recCategories, 'products' => $products]); ?>

    <!-- Banner Begin -->
<?php //= $this->render('template/_banner'); ?>

    <!-- Latest Product Section Begin -->
<?= $this->render('template/_latest-product'); ?>

    <!-- Blog Section Begin -->
<?= $this->render('template/_blog',['blogs'=>$blogs]); ?>