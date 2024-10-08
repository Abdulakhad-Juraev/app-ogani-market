<?php

use frontend\components\Cart;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                   <?=$this->render('_shopping_table')?>
                </div>
            </div>
        </div>
        <div class="row">
<!--            <div class="col-lg-12">-->
<!--                <div class="shoping__cart__btns">-->
<!--                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>-->
<!--                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>-->
<!--                        Upadate Cart</a>-->
<!--                </div>-->
<!--            </div>-->
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
<!--                        <li>Subtotal <span>--><?php //= Cart::totalSum(); ?><!--$454.98</span></li>-->
                        <li>Total <span>$454.98</span></li>
                    </ul>
                    <a href="<?= Url::to(['site/checkout']); ?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
