<?php

use frontend\components\Cart;
use yii\helpers\Url;
use yii\helpers\Html;

?>
<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i>
                                <?= Yii::t('app', 'pochta_manzili'); ?></li>
                            <li><?= Yii::t('app', 'menu_aksiya'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <?php foreach ($socials as $item): ?>
                                <a href="<?= $item?->url ?>">
                                    <img src="<?= $item?->imageUrl; ?>" alt="" style="width:16px; height:16px">
                                </a>
                            <?php endforeach; ?>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-telegram"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <!--                            <img src="/template/img/language.png" alt="">-->
                            <div><?= strtoupper(Yii::$app->language); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <?php
                                $languages = ['uz', 'ru', 'en'];
                                foreach ($languages as $langCode) {
                                    if (Yii::$app->language !== $langCode): ?>
                                        <li>
                                            <a href="<?= Url::current(['lang' => $langCode]) ?>"><?= strtoupper($langCode) ?></a>
                                        </li>
                                    <?php endif;
                                }
                                ?>
                            </ul>

                        </div>
                        <style>
                            .l {
                                text-decoration: none
                            }
                        </style>
                        <div class="header__top__right__auth">
                            <?php


                            if (Yii::$app->user->isGuest) {
                                echo Html::a('<i class="fa fa-user"></i> Login', Url::to(['site/login']));
                            } else {
                                echo Html::beginForm(['/site/logout'], 'post', ['style' => 'display:inline;'])
                                    . Html::submitButton('<i class="fa fa-user" style="margin-right: 6px;"></i> Logout',
                                        [
                                            'class' => 'p-0 border-0 text-decoration-none',
                                            'style' => 'font-size: 14px; color: #1c1c1c;'
                                        ])
                                    . Html::endForm();
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?= Url::to(['/site']) ?>"><img src="/template/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="<?= Url::to(['/site']); ?>">Home</a></li>
                        <li><a href="<?= Url::to(['/blog']); ?>">Blog</a></li>
                        <li><a href="<?= Url::to(['/shop']); ?>">Shop</a></li>
                        <li><a href="<?= Url::to(['site/contact']); ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li>
                            <a href="<?= Url::to(['site/shopping-cart']); ?>">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="myCart"><?= Cart::totalCount() ?></span>
                            </a>
                        </li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->