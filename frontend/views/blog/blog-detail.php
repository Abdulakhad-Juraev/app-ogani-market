<?php

use backend\models\Blog;
use yii\helpers\Url;

/** @var Blog[] $blog */
/** @var Blog[] $blogs_rand */
/** @var Blog[] $blogsRecent */


?>
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="/template/img/blog/details/details-hero.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2><?= $blog->title; ?></h2>
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
            <?=$this->render('_left_sidebar',['blogsRecent'=>$blogsRecent]);?>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="<?= $blog->getImageUrl(); ?>" alt="">
                    <p><?= $blog->content; ?></p>
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <!--                        <div class="col-lg-6">-->
                        <!--                            <div class="blog__details__author">-->
                        <!--                                <div class="blog__details__author__pic">-->
                        <!--                                    <img src="/template/img/blog/details/details-author.jpg" alt="">-->
                        <!--                                </div>-->
                        <!--                                <div class="blog__details__author__text">-->
                        <!--                                    <h6>Michael Scofield</h6>-->
                        <!--                                    <span>Admin</span>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <div class="col-lg-12">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Categories:</span> Food</li>
                                    <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
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
                    <h2>Post You May Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <? foreach ($blogs_rand as $item): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?= $item->getImageUrl(); ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li>
                                    <i class="fa fa-calendar-o"></i><?= Yii::$app->formatter->asDate($item->date, 'd-MM-Y'); ?>
                                </li>
                                <!--                            <li><i class="fa fa-comment-o"></i> 5</li>-->
                            </ul>
                            <h5><a href="<?= Url::to(['/blog/blog-detail','slug'=>$item->slug])?>"><?= $item->title; ?></a></h5>
                            <p><?= $item->short_desc; ?></p>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Blog Section End -->
