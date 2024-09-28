<?php

use yii\helpers\Url;

?>
<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="<?=Url::to(['/site'])?>"><img src="/template/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="/template/img/language.png" alt="">
            <div>English22</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="<?= Url::current(['lang' => 'uz']) ?>">UZ</a></li>
                <li><a href="<?= Url::current(['lang' => 'ru']) ?>">RU</a></li>
                <li><a href="<?= Url::current(['lang' => 'en']) ?>">EN</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="<?= Url::to(['/site']); ?>">Home</a></li>
            <li><a href="<?= Url::to(['/blog']); ?>">Blog</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="<?= Url::to(['site/shop-details']); ?>">Shop Details</a></li>
                    <li><a href="<?= Url::to(['site/shopping-cart']); ?>">Shoping Cart</a></li>
                    <li><a href="<?= Url::to(['site/checkout']); ?>">Check Out</a></li>
                    <li><a href="<?= Url::to(['site/blog-details']); ?>">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="<?= Url::to(['site/contact']); ?>">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> <?=Yii::t('app','pochta_manzili');?></li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->
<?php
