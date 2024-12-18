<?php

use backend\models\Blog;

/** @var Blog[] $blogsRecent */
?>
<div class="col-lg-4 col-md-5">
    <div class="blog__sidebar">
        <div class="blog__sidebar__search">
            <form action="#">
                <input type="text" placeholder="Search...">
                <button type="submit"><span class="icon_search"></span></button>
            </form>
        </div>
        <div class="blog__sidebar__item">
            <? Yii::$app->TestComponent->blogCategories(); ?>
        </div>
        <div class="blog__sidebar__item">
            <? Yii::$app->TestComponent->blogRecentNews($blogsRecent); ?>
        </div>
        <div class="blog__sidebar__item">
            <? Yii::$app->TestComponent->getTags(); ?>
        </div>
    </div>
</div>