<?php

namespace common\components;

use common\modules\product\models\Product;
use Yii;
use yii\base\Component;
use yii\db\Expression;
use yii\helpers\Url;

/** @var Product $products */
class TestComponent extends Component
{
    const STATUS_ACTIVE = 1;

    public function message()
    {
        echo "TestComponent is working";
    }

    public function productLatest($offset = 0)
    {
        $products = Product::find()
            ->where(['is_stock' => Product::STOCK_TRUE])
            ->offset($offset)
            ->limit(3)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        ?>

        <div class="latest-prdouct__slider__item">
            <? foreach ($products as $product): ?>
                <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug ?? '']); ?>"
                   class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img src="<?= $product->image ?? '' ?>" alt="<?= $product->name ?? '' ?>"
                             style="width:110px;height:100px">
                    </div>
                    <div class="latest-product__item__text">
                        <h6><?= $product->name ?? ''; ?></h6>
                        <span>$<?= $product->price ?? ''; ?></span>
                    </div>
                </a>
            <? endforeach; ?>

        </div>

        <?php
    }

    public function productRated($offset)
    {
        $products = Product::find()
            ->where(['=', 'is_stock', true])
            ->andWhere(['>', 'start_count', '0'])
            ->offset($offset)
            ->limit(3)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        ?>

        <div class="latest-prdouct__slider__item">
            <div class="latest-prdouct__slider__item">
                <? foreach ($products as $product): ?>
                    <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug]); ?>" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="<?= $product->getImage() ?>" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6><?= $product->name; ?></h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>
        </div>


        <?php
    }

    public function productReview()
    {
        $products = Product::find()
            ->orderBy(new Expression('rand()'))
            ->limit(3)
            ->all();
        ?>

        <div class="latest-prdouct__slider__item">
            <? foreach ($products as $product):
                ?>
                <a href="<?= Url::to(['/shop/detail', 'slug' => $product->slug]); ?>" class="latest-product__item">
                    <div class="latest-product__item__pic">
                        <img src="<?= $product->image ?? '' ?>" alt="" style="width:110px;height:100px">
                    </div>
                    <div class="latest-product__item__text">
                        <h6><?= $product->name ?? ''; ?></h6>
                        <span><?= $product->price ?? ''; ?></span>
                    </div>
                </a>
            <? endforeach; ?>
        </div>
        <?php
    }

    /**
     * @param $categories
     * @return void
     */
    public function blogCategories($categories)
    {
        ?>
        <h4><?= Yii::t('app', 'Categories'); ?></h4>
        <ul>
            <li><a href="<?= Url::to(['/blog/index']); ?>"><?= Yii::t('app', 'all'); ?></a></li>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="<?= Url::to(['/blog/blog-category', 'id' => $category->id ?? '']); ?>"><?= $category->name ?? ''; ?>
                        (<?= $category->blogCount ?? 0 ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

    /**
     * @param $categories
     * @return void
     */
    public function homePageCategories($categories)
    {
        foreach ($categories as $category) : ?>
            <div class="col-lg-3">
                <div class="categories__item set-bg" data-setbg="<?= $category->getImageUrl(); ?>">
                    <h5><a href="<?= Url::to(['/category', 'slug' => $category->slug]) ?>"><?= $category->name; ?></a>
                    </h5>
                </div>
            </div>
        <? endforeach;
    }

    public function blogRecentNews($blogsRecent)
    {
        ?>
        <h4><?= Yii::t('app', 'Recent News') ?></h4>
        <div class="blog__sidebar__recent">
            <? foreach ($blogsRecent as $item): ?>
                <a href="<?= Url::to(['/blog/blog-detail', 'slug' => $item->slug ?? '']) ?>"
                   class="blog__sidebar__recent__item">
                    <div class="blog__sidebar__recent__item__pic">
                        <img src="<?= $item->imageUrl ?? ''; ?>" width="70px" height="70px" alt="">
                    </div>
                    <div class="blog__sidebar__recent__item__text w-50">
                        <h6><?= $item->title ?? ''; ?></h6>
                        <span> <?= Yii::$app->formatter->asDate($item->date ?? '', 'dd-MM-Y'); ?></span>
                    </div>
                </a>
            <? endforeach; ?>

        </div>

    <?php }

    public function getTags($tags)
    {
        ?>
        <h4><?= Yii::t('app', 'Search By') ?></h4>
        <div class="blog__sidebar__item__tags">
            <? foreach ($tags as $tag): ?>
                <a href="<?= Url::to(['/blog/blog-tags', 'id' => $tag->id]); ?>"><?= $tag['name']; ?></a>
            <? endforeach; ?>
        </div>
        <?php
    }


    /**
     * @return void
     */
    public function getLatestProductShop()
    {
        ?>

        <div class="latest-product__text">
            <h4>Latest Products</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="/template/img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>Crab Pool Security</h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="/template/img/latest-product/lp-2.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>Crab Pool Security</h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="/template/img/latest-product/lp-3.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>Crab Pool Security</h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                </div>
                <div class="latest-prdouct__slider__item">
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="/template/img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>Crab Pool Security</h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="/template/img/latest-product/lp-2.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>Crab Pool Security</h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                    <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                            <img src="/template/img/latest-product/lp-3.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                            <h6>Crab Pool Security</h6>
                            <span>$30.00</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <?php
    }


    public function shopCategories($categories)
    {
        ?>
        <h4><?= Yii::t('app', 'Categories'); ?></h4>
        <ul>
            <li><a href="<?= Url::to(['/shop/index']); ?>"><?= Yii::t('app', 'all'); ?></a></li>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="<?= Url::to(['/shop/category', 'id' => $category->id ?? '']); ?>"><?= $category->name ?? ''; ?>
                        (<?= $category->categoryProductCount ?? 0 ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}

