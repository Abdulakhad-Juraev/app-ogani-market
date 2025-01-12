<?php

use backend\models\Social;
use frontend\components\Cart;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var Social $socials */
$activeClass = 'active';
$route = Yii::$app->controller->route;
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
                                <a href="<?= $item->url ?? '' ?>">
                                    <img src="<?= $item->imageUrl ?? ''; ?>" alt="" style="width:16px; height:16px">
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="header__top__right__language">
                            <div><?= strtoupper(Yii::$app->language); ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <?php
                                $languages = ['uz', 'ru', 'en']; ?>
                                <?php foreach ($languages as $langCode):
                                    if (Yii::$app->language !== $langCode): ?>
                                        <li>
                                            <a href="<?= Url::current(['lang' => $langCode]) ?>"><?= strtoupper($langCode) ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>

                        </div>
                        <div class="header__top__right__language">
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <li class="list-unstyled">
                                    <a href="<?= Url::to(['/site/login']) ?>" style="color:#1c1c1c;"><i
                                                class="fa fa-user"></i> Login</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <div><i class="fa fa-user"></i> <?=Yii::t('app','Profile');?></div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="<?= Url::to(['/site/profile']) ?>">Profile</a></li>
                                    <li>
                                        <?php
                                        echo Html::beginForm(['/site/logout'], 'post', ['style' => 'display:inline;'])
                                            . Html::submitButton('Logout',
                                                [
                                                    'class' => 'text-white border-0 text-decoration-none',
                                                    'style' => 'background:none;padding-left:10px;font-size: 14px; color: #1c1c1c;'
                                                ])
                                            . Html::endForm();
                                        ?></li>
                                </ul>
                                <?php
                            } ?>
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
                    <a href="<?= Url::to(['/site/index']) ?>"><img src="/template/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="<?= ($route == 'site/index') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/site/index']); ?>"><?=Yii::t('app','home')?></a>
                        </li>
                        <li class="<?= (Yii::$app->controller->id == 'blog') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/blog/index']); ?>"><?=Yii::t('app','from_the_blog')?></a>
                        </li>
                        <li class="<?= ($route == 'shop/index' || $route == 'shop/detail' || $route == 'shop/category') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/shop/index']); ?>"><?=Yii::t('app','Shop');?></a>
                        </li>
                        <li class="<?= ($route == 'shop/discount') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/shop/discount']); ?>"><?=Yii::t('app','Discount');?></a>
                        </li>
                        <li class="<?= ($route == 'site/contact') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/site/contact']); ?>"><?=Yii::t('app','contact_page');?></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header__cart">
                    <ul>
                        <!--                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>-->
                        <li>
                            <a href="<?= Url::to(['site/shopping-cart']); ?>">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="myCart"><?= Cart::totalCount() ?></span>
                            </a>
                        </li>
                    </ul>
                    <div class="header__cart__price"><?=Yii::t('app','Price')?>: <span class="myCart__price"><?= Cart::totalSum() ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->