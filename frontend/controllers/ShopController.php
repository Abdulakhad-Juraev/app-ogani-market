<?php

namespace frontend\controllers;

use backend\models\Category;
use common\modules\auth\models\UserComments;
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
use yii\web\NotFoundHttpException;

class ShopController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $discountSuperCategoryIds = DiscountSuperCategory::find()->select('super_category_id')->column();
        $userId = Yii::$app->user->id;
        $query = Product::find()
            ->andWhere(['not in', 'super_category_id', $discountSuperCategoryIds])
            ->andWhere(['is_stock' => Product::STOCK_TRUE])->all();

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

        $productsWithLikes = array_map(function ($product) use ($userId) {
            // Likeni qo'shish
            $product->is_liked = $product->getIsLiked($userId);
            return $product;
        }, $query);

        $discountProductsWithLikes = array_map(function ($product) use ($userId) {
            // Likeni qo'shish
            $product->is_liked = $product->getIsLiked($userId);
            return $product;
        }, $discountProducts);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $productsWithLikes,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'discountProducts' => $discountProductsWithLikes,
            'productsCount' => $productsCount
        ]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetail($slug)
    {
        $product = Product::findOne(['slug' => $slug]);
        $userId = Yii::$app->user->id;
        if (!$product) {
            throw new NotFoundHttpException("Product not found!");
        }

        $reviews = UserComments::find()->orderBy(['id' => SORT_DESC])->andWhere(['product_id' => $product->id])->all();


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

        // Adding 'is_liked' to the main product
        $product->is_liked = $product->getIsLiked($userId);

        // Adding 'is_liked' to related products
        $relatedProductsLike = array_map(function ($relatedProduct) use ($userId) {
            $relatedProduct->is_liked = $relatedProduct->getIsLiked($userId);
            return $relatedProduct;
        }, $relatedProducts);

        // Adding 'is_liked' to bundle products
        $bundleProductsLike = array_map(function ($bundleProduct) use ($userId) {
            $bundleProduct->is_liked = $bundleProduct->getIsLiked($userId);
            return $bundleProduct;
        }, $bundleProducts);

        return $this->render('detail', [
            'product' => $product,
            'relatedProducts' => $relatedProductsLike,
            'bundleProducts' => $bundleProductsLike,
            'reviews' => $reviews
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
    /**
     * @return string
     */
    public function actionDiscount()
    {
        $discountSuperCategoryIds = DiscountSuperCategory::find()->select('super_category_id')->column();

        $query = Product::find()
            ->andWhere(['in', 'super_category_id', $discountSuperCategoryIds])
            ->orderBy(['id' => SORT_DESC])
            ->andWhere(['is_stock' => Product::STOCK_TRUE])->all();

        $categories = SuperCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->andWhere(['status' => 1])
            ->andWhere(['in', 'id', $discountSuperCategoryIds])
            ->all();
        $userId = Yii::$app->user->id;
        $productsWithLikes = array_map(function ($product) use ($userId) {
//             Likeni qo'shish
            $product->is_liked = $product->getIsLiked($userId);
            return $product;
        }, $query);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $productsWithLikes,
        ]);

//        $dataProvider = new ActiveDataProvider([
//            'query' => $query
//        ]);
//
        return $this->render('discount', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }

}