<?php

use frontend\components\Cart;
use yii\helpers\Url;

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
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-telegram"></i></a>
                        </div>
                        <div class="header__top__right__language">
<!--                            <img src="/template/img/language.png" alt="">-->
                            <div><?=Yii::$app->language;?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?= Url::current(['lang' => 'uz']) ?>">UZ</a></li>
                                <li><a href="<?= Url::current(['lang' => 'ru']) ?>">RU</a></li>
                                <li><a href="<?= Url::current(['lang' => 'en']) ?>">EN</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="<?= Url::to(['site/login']) ?>"><i class="fa fa-user"></i> Login</a>
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