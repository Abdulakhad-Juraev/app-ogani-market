<?php

use backend\models\Category;

/** @var Category $categories */
?>
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <? Yii::$app->TestComponent->homePageCategories($categories) ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->