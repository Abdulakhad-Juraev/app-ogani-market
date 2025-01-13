<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?=Yii::t('app','latest_products');?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php Yii::$app->TestComponent->productLatest();?>
                        <?php Yii::$app->TestComponent->productLatest(3);?>
                        <?php Yii::$app->TestComponent->productLatest(6);?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?=Yii::t('app','top_rated_products');?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php Yii::$app->TestComponent->productRated(0);?>
                        <?php Yii::$app->TestComponent->productRated(3);?>
                        <?php Yii::$app->TestComponent->productRated(6);?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?=Yii::t('app','review_products');?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <?php Yii::$app->TestComponent->productReview();?>
                        <?php Yii::$app->TestComponent->productReview();?>
                        <?php Yii::$app->TestComponent->productReview();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->