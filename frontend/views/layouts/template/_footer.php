<?php

use backend\models\Social;
use yii\helpers\Url;

$activeClass = 'active';
$route = Yii::$app->controller->route;
/** @var Social $socials */
?>
<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href=""><img src="template/img/logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li><?= Yii::t('app', 'address'); ?>: <?= Yii::t('app', 'address_manzil'); ?></li>
                        <li><?= Yii::t('app', 'phone'); ?>: <?= Yii::t('app', 'tel_raqam'); ?></li>
                        <li><?= Yii::t('app', 'email'); ?>: <?= Yii::t('app', 'pochta_manzili'); ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6><?= Yii::t('app', 'Useful Links') ?></h6>
                    <ul>
                        <li class="<?= ($route == 'site/index') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/site/index']); ?>"><?= Yii::t('app', 'home') ?></a>
                        </li>
                        <li class="<?= (Yii::$app->controller->id == 'blog') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/blog/index']); ?>"><?= Yii::t('app', 'from_the_blog') ?></a>
                        </li>
                        <li class="<?= ($route == 'shop/index' || $route == 'shop/detail' || $route == 'shop/category') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/shop/index']); ?>"><?= Yii::t('app', 'Shop'); ?></a>
                        </li>
                        <li class="<?= ($route == 'shop/discount') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/shop/discount']); ?>"><?= Yii::t('app', 'Discount'); ?></a>
                        </li>
                        <li class="<?= ($route == 'site/contact') ? $activeClass : ''; ?>">
                            <a href="<?= Url::to(['/site/contact']); ?>"><?= Yii::t('app', 'contact_page'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6><?= Yii::t('app', 'contact'); ?></h6>
<!--                    <p>--><?php //= Yii::t('app', 'special_offers'); ?><!--</p>-->
                    <form action="/site/contact">
                        <input type="text" placeholder="<?= Yii::t('app', 'form_email'); ?>">
                        <button type="submit" class="site-btn"><?= Yii::t('app', 'send_message'); ?></button>
                    </form>
                    <div class="footer__widget__social">
                        <?php foreach ($socials as $item): ?>
                            <a href="<?= $item->url ?? ''?>">
                                <img src="<?= $item->imageUrl ?? ''; ?>" alt="" style="width:16px; height:16px">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->