<?php

namespace frontend\controllers;

use backend\models\Category;
use common\modules\blog\models\Tags;
use common\modules\discount\models\DiscountSuperCategory;
use common\modules\product\models\Product;
use common\modules\product\models\SuperCategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\helpers\Json;
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
            ->andWhere(['is_stock' => Product::STOCK_TRUE])
            ->orderBy(new Expression('rand()'))
            ->limit(10)
            ->all();

        $categories = SuperCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->andWhere(['status' => 1])
            ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'discountProducts' => $discountProducts,
            'productsCount' => $productsCount
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

    /**
     * @param $id
     * @return string
     */
    public function actionCategory($id)
    {
        $model = Product::find()->andWhere(['super_category_id' => $id]);

        $categories = SuperCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->andWhere(['status' => 1])
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $model
        ]);

        return $this->render('shop-category', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function actionFilter()
    {
        $minPrice = Yii::$app->request->get('minamount', 0);
        $maxPrice = Yii::$app->request->get('maxamount', 1000);

        $query = Product::find()
            ->andWhere(['is_stock' => Product::STOCK_TRUE])
            ->andWhere(['between', 'price', $minPrice, $maxPrice]);

        $products = $query->all();
        $productsCount = $query->count();

        $productsHtml = $this->renderPartial('_product_list', [
            'products' => $products
        ]);

        return Json::encode([
            'productsHtml' => $productsHtml,
            'productsCount' => $productsCount
        ]);
    }


    /**
     * @return string
     */
    public function actionDiscount()
    {
        $discountSuperCategoryIds = DiscountSuperCategory::find()->select('super_category_id')->column();

        $query = Product::find()
            ->andWhere(['in', 'super_category_id', $discountSuperCategoryIds])
            ->orderBy(['id' => SORT_DESC])
            ->andWhere(['is_stock' => Product::STOCK_TRUE]);

        $categories = SuperCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->andWhere(['status' => 1])
            ->andWhere(['in', 'id', $discountSuperCategoryIds])
            ->all();
        $userId = Yii::$app->user->id;
//        $productsWithLikes = array_map(function ($product) use ($userId) {
//             Likeni qo'shish
//            $product->is_liked = $product->getIsLiked($userId);
//            return $product;
//        }, $query);
//
//        $dataProvider = new ArrayDataProvider([
//            'allModels' => $productsWithLikes,
//        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
//
        return $this->render('discount', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }

}