<?php

use backend\models\Blog;
use yii\helpers\Url;

/** @var Blog[] $blogs */
?>
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2><?= Yii::t('app', 'from_the_blog'); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <? foreach ($blogs as $blog): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?= $blog->getImageUrl() ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>
                                    <?= Yii::$app->formatter->asDate($blog->date, 'd-MM-Y'); ?>
                                </li>
                            </ul>
                            <h5>
                                <a href="<?= Url::to(['/blog/blog-detail', 'slug' => $blog->slug]) ?>"><?= $blog->title; ?></a>
                            </h5>
                            <p><?= $blog->short_desc; ?></p>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>