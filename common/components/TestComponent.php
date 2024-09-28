<?php

namespace common\components;

use backend\models\Category;
use backend\models\Product;
use backend\models\Tags;
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
            ->where(['=', 'is_stock', true])
            ->offset($offset)
            ->limit(3)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        ?>

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
                        <img src="<?= $product->getImage() ?>" alt="">
                    </div>
                    <div class="latest-product__item__text">
                        <h6><?= $product->name; ?></h6>
                        <span>$30.00</span>
                    </div>
                </a>
            <? endforeach; ?>
        </div>
        <?php
    }

    public function blogCategories()
    {

        $categories = Category::find()
            ->orderBy(['id' => SORT_DESC])
            ->where(['status' => self::STATUS_ACTIVE])
            ->all();
        ?>

        <h4>Categories</h4>
        <ul>
            <li><a href="#">All</a></li>
            <?php foreach ($categories as $category): ?>
                <li><a href="<?= Url::to(['/category','slug'=>$category->slug]);?>"><?= $category->name; ?> (<?= $category->getCategoryProductCount() ?>)</a></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

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
        <h4>Recent News</h4>
        <div class="blog__sidebar__recent">

            <? foreach ($blogsRecent as $item): ?>
                <a href="<?= Url::to(['/blog/blog-detail', 'slug' => $item->slug]) ?>" class="blog__sidebar__recent__item">
                    <div class="blog__sidebar__recent__item__pic">
                        <img src="<?= $item->getImageUrl(); ?>" width="70px" height="70px" alt="">
                    </div>
                    <div class="blog__sidebar__recent__item__text">
                        <h6><?= $item->title; ?></h6>
                        <h6><?= $item->short_desc; ?></h6>
                        <span> <?= Yii::$app->formatter->asDate($item->date, 'd-MM-Y'); ?></span>
                    </div>
                </a>
            <? endforeach; ?>

        </div>

    <?php }

    public function getTags()
    {
        $tags = Tags::find()->orderBy(['id' => SORT_DESC])->limit(10)->all();
        ?>
        <h4>Search By</h4>
        <div class="blog__sidebar__item__tags">
            <? foreach ($tags as $tag): ?>
                <a href=""><?= $tag['name']; ?></a>
            <? endforeach; ?>
        </div>
        <?php
    }



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
}