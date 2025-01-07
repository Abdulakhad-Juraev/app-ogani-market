<?php use yii\helpers\Url;

//if (!empty($products)): ?>
<!--    <div class="row">-->
<!--        --><?php //foreach ($products as $product): ?>
<!--            <div class="col-lg-4">-->
<!--                <div class="product__discount__item">-->
<!--                    <div class="product__discount__item__pic set-bg" data-setbg="--><?php //= $product->image ?><!--">-->
<!--                        <div class="product__discount__percent">-->
<!--                            ---><?php //= $product->superCategory->assignDiscountSuperCategory->discount->percentage ?? 0 ?><!--%-->
<!--                        </div>-->
<!--                        <ul class="product__item__pic__hover">-->
<!--                            <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                            <li>-->
<!--                                <a href="--><?php //= Url::to(['/cart/add-to-cart', 'id' => $product->id]) ?><!--" class="addToCart">-->
<!--                                    <i class="fa fa-shopping-cart"></i>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="product__discount__item__text">-->
<!--                        <span>--><?php //= $product->superCategory->name ?? '' ?><!--</span>-->
<!--                        <h5>-->
<!--                            <a href="--><?php //= Url::to(['/shop/detail', 'slug' => $product->slug]) ?><!--">--><?php //= $product->name ?><!--</a>-->
<!--                        </h5>-->
<!--                        <div class="product__item__price">--><?php //= $product->price ?>
<!--                            <span>--><?php //= $product->discount_price ?><!--</span></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<?php //else: ?>
<!--    <p>No products viewed recently.</p>-->
<?php //endif; ?>


<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row owl-carousel owl-theme">
                            <?php foreach ($products as $product): ?>
                                <div class="col-lg-3" style="max-width:100%;">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="<?=$product->image;?>"
                                             style="background-image: url('<?=$product->image;?>')"
                                        >
                                            <ul class="product__item__pic__hover">
                                                <li> <a href="#" class="add-like-btn-hover"
                                                        data-id="<?= $product->id ?>"
                                                        data-user-id="<?= Yii::$app->user->isGuest ? 'null' : Yii::$app->user->identity->id ?>">

                                                        <i class="fa fa-heart add-like-btn"
                                                           style="color:<?= $product->is_liked ? 'red' : '#1c1c1c'; ?>"></i>
                                                    </a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li>
                                                    <a href="<?= Url::to(['/cart/add-to-cart', 'id' => $product->id ?? '']) ?>"
                                                       class="addToCart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?= $product->superCategory->name ?? '' ?></span>
                                            <h5>
                                                <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug]); ?>"><?= $product->name ?? '' ?></a>
                                            </h5>
                                            <div class="product__item__price"><?= $product->price ?? '' ?>
                                                <span><?= $product->discount_price ?? '' ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2500,
        autoplayHoverPause:true
    });
</script>