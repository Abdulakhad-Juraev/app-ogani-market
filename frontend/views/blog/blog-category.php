<?php

use backend\models\Category;
use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogCategory;
use common\modules\blog\models\Tags;
use yii\bootstrap4\LinkPager;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/** @var Blog[] $blogs */
/** @var Blog[] $blogsRecent */
/** @var BlogCategory[] $blogCategories */
/** @var Tags[] $tags */

/** @var ActiveDataProvider $dataProvider */

$model = $dataProvider->models;
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Blog</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('app', 'home'); ?></a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <?= $this->render('_left_sidebar', ['blogsRecent' => $blogsRecent, 'tags' => $tags, 'blogCategories' => $blogCategories]); ?>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php foreach ($model as $blog): ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?= $blog->imageUrl ?? ''; ?>" alt="" style="height:258px">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li>
                                            <i class="fa fa-calendar-o"></i> <?= Yii::$app->formatter->asDate($blog->date ?? '', 'dd-MM-Y'); ?>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="<?= Url::to(['/blog/blog-detail', 'slug' => $blog->slug ?? '']) ?>"><?= $blog->title ?? ''; ?></a>
                                    </h5>
                                    <p><?= $blog->short_desc; ?></p>
                                    <a href="<?= Url::to(['/blog/blog-detail', 'slug' => $blog->slug ?? '']) ?>"
                                       class="blog__btn">
                                        <?= Yii::t('app', 'Read more'); ?>
                                        <span class="arrow_right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <style>
                                .page-item .page-link {
                                    line-height: 1;
                                }

                                .page-item.active .page-link {
                                    background-color: #7fad39;
                                    border-color: #7fad39;
                                }
                            </style>
                            <?= LinkPager::widget([
                                'pagination' => $dataProvider->pagination,
                                'maxButtonCount' => 3,
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
