<?php

namespace frontend\controllers;

use backend\models\Product;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ShopController extends Controller
{
    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $query = Product::find()
            ->andWhere(['is_stock' => Product::STOCK_TRUE]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 20
            ]
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionDetail($slug)
    {
        $product = Product::findOne(['slug' => $slug]);
        $relatedProducts = Product::find()
            ->where(['is_stock' => true])
            ->orderBy(new Expression('rand()'))
            ->limit(4)
            ->all();
        return $this->render('detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

}