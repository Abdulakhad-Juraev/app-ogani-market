<?php

use backend\models\Category;
use backend\models\Product;
use backend\models\Blog;

/** @var Category $categories */
/** @var Product $products */
/** @var Blog $blogs */

?>
    <!-- Categories Section Begin -->
<?= $this->render('template/_category', ['categories' => $categories]); ?>

    <!-- Featured Section Begin -->
<?= $this->render('template/_featured-product', ['categories' => $categories, 'products' => $products]); ?>

    <!-- Banner Begin -->
<?= $this->render('template/_banner'); ?>

    <!-- Latest Product Section Begin -->
<?= $this->render('template/_latest-product'); ?>

    <!-- Blog Section Begin -->
<?= $this->render('template/_blog',['blogs'=>$blogs]); ?>