<?php

use backend\models\Category;
use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogCategory;
use common\modules\blog\models\Tags;

/** @var Tags[] $tags */
/** @var Blog[] $blogsRecent */
/** @var BlogCategory[] $blogCategories */
?>
<div class="col-lg-4 col-md-5">
    <div class="blog__sidebar">
        <div class="blog__sidebar__search">
            <form action="#">
                <label style="display:block!important;">
                    <input type="text" placeholder="Search...">
                </label>
                <button type="submit"><span class="icon_search"></span></button>
            </form>
        </div>
        <div class="blog__sidebar__item">
            <?php Yii::$app->TestComponent->blogCategories($blogCategories); ?>
        </div>
        <div class="blog__sidebar__item">
            <?php Yii::$app->TestComponent->blogRecentNews($blogsRecent); ?>
        </div>
        <div class="blog__sidebar__item">
            <?php Yii::$app->TestComponent->getTags($tags); ?>
        </div>
    </div>
</div>