<?php

use backend\models\Category;
use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogCategory;
use common\modules\blog\models\Tags;
use yii\helpers\Url;

/** @var Blog[] $blog */
/** @var Blog[] $blogs_rand */
/** @var Blog[] $blogsRecent */
/** @var BlogCategory[] $blogCategories */
/** @var Tags[] $tags */

?>
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="/template/img/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?= $blog->title ?? ''; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <?= $this->render('_left_sidebar', ['blogsRecent' => $blogsRecent, 'tags' => $tags, 'blogCategories' => $blogCategories]); ?>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="<?= $blog->imageUrl ?? ''; ?>" class="w-100" alt="">
                    <h3><?= $blog->title ?? ''; ?></h3>
                    <p><?= $blog->content ?? ''; ?></p>
                </div>
                <div class="blog__details__content">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span><?= Yii::t('app', 'Categories') ?>: </span>
                                        <?= $blog->category->name ?? ''; ?>
                                    </li>
                                    <li><span><?= Yii::t('app', 'Search By') ?>:</span>

                                        <?= implode(', ', array_map(fn($item) => $item->tags->name ?? '', $blog->assignBlogTags ?? '')); ?>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2><?=Yii::t('app','Post You May Like');?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($blogs_rand as $item): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?= $item->imageUrl ?? ''; ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li>
                                    <i class="fa fa-calendar-o"></i> <?= Yii::$app->formatter->asDate($item->date ?? '', 'd-MM-Y'); ?>
                                </li>
                            </ul>
                            <h5>
                                <a href="<?= Url::to(['/blog/blog-detail', 'slug' => $item->slug ?? '']) ?>"><?= $item->title ?? ''; ?></a>
                            </h5>
                            <p><?= $item->short_desc ?? ''; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Blog Section End -->
