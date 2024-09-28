<?php

use backend\models\Category;
use yii\helpers\Url;

$categories = Category::getCategories();
?>
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span><?=Yii::t('app','all_category');?> </span>
                    </div>
                    <ul>
                        <? foreach ($categories as $item): ?>
                            <li><a href="<?= Url::to(['/category','slug'=>$item->slug]);?>"><?= $item->name; ?></a></li>
                        <? endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="<?=Yii::t('app','home_search_placeholder');?>">
                            <button type="submit" class="site-btn"><?=Yii::t('app','search');?></button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5><?=Yii::t('app','tel_raqam');?></h5>
                            <span><?=Yii::t('app','support_time');?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->