<?php

namespace frontend\controllers;

use backend\models\Category;
use common\modules\blog\models\Tags;
use common\modules\discount\models\DiscountSuperCategory;
use common\modules\product\models\Product;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;

class ShopController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $discountSuperCategoryIds = DiscountSuperCategory::find()->select('super_category_id')->column();

        $query = Product::find()
            ->andWhere(['not in', 'super_category_id', $discountSuperCategoryIds])
            ->andWhere(['is_stock' => Product::STOCK_TRUE]);

        $productsCount = Product::find()
            ->andWhere(['not in', 'super_category_id', $discountSuperCategoryIds])
            ->andWhere(['is_stock' => Product::STOCK_TRUE])->count();

        $discountProducts = Product::find()
            ->andWhere(['in', 'super_category_id', $discountSuperCategoryIds])
            ->andWhere(['is_stock' => Product::STOCK_TRUE])->all();

        $categories = Category::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->where(['status' => 1])
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'tags' => $tags,
            'discountProducts' => $discountProducts,
            'productsCount' => $productsCount,

        ]);
    }

    /**
     * @param $slug
     * @return string
     */
    public function actionDetail($slug)
    {
        $product = Product::findOne(['slug' => $slug]);
        $relatedProducts = Product::find()
            ->andWhere(['!=', 'id', $product->id])
            ->andWhere(['is_stock' => Product::STOCK_TRUE])
            ->orderBy(new Expression('rand()'))
            ->limit(10)
            ->all();

        $bundleProducts = Product::find()
            ->andWhere(['=', 'bundle_category_id', $product->super_category_id])
            ->andWhere(['!=', 'id', $product->id])
            ->andWhere(['is_stock' => Product::STOCK_TRUE])
            ->orderBy(new Expression('rand()'))
            ->limit(20)
            ->all();

        return $this->render('detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'bundleProducts' => $bundleProducts,
        ]);
    }

}