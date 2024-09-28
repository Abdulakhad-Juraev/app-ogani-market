<div class="col-lg-3 col-md-5">
    <div class="sidebar">
        <div class="sidebar__item">
            <? Yii::$app->TestComponent->blogCategories(); ?>
        </div>
        <div class="sidebar__item">
            <h4>Price</h4>
            <div class="price-range-wrap">
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                     data-min="10" data-max="1000">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
                <div class="range-slider">
                    <div class="price-input">
                        <input type="text" id="minamount">
                        <input type="text" id="maxamount">
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar__item">
            <div class="latest-product__text">
                <h4>Latest Products</h4>
                <div class="latest-product__slider owl-carousel">
                    <? Yii::$app->TestComponent->productLatest(0); ?>
                    <? Yii::$app->TestComponent->productLatest(3); ?>
                    <? Yii::$app->TestComponent->productLatest(6); ?>
                </div>
            </div>
        </div>
        <div class="sidebar__item">
            <? Yii::$app->TestComponent->getTags(); ?>
        </div>
    </div>
</div>