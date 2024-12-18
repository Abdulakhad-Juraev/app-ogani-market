<?php

namespace frontend\controllers;

use backend\models\Product;
use frontend\components\Cart;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{

    /**
     * @return Response
     */
    public function actionAddToCart()
    {
        $id = Yii::$app->request->get('id');

        $product = Product::findOne($id);
        $result = [];

        if (Yii::$app->request->isAjax) {
            Cart::add($product->id);
            $result['totalProductCount'] = Cart::totalCount();
            $result['shopingCartTable'] = $this->renderAjax('@frontend/views/site/pages/_shopping_table');
        }

        return $this->asJson($result);
    }

    public function actionMinusFromCart()
    {
        $id = Yii::$app->request->get('id');

        $product = Product::findOne($id);
        $result = [];

        if (Yii::$app->request->isAjax) {
            Cart::minus($product->id);
            $result['totalProductCount'] = Cart::totalCount();
            $result['shopingCartTable'] = $this->renderAjax('@frontend/views/site/pages/_shopping_table');
        }

        return $this->asJson($result);
    }

    public function actionRemoveFromCart()
    {
        $id = Yii::$app->request->get('id');

        $product = Product::findOne($id);
        $result = [];

        if (Yii::$app->request->isAjax) {
            Cart::remove($product->id);
            $result['totalProductCount'] = Cart::totalCount();
            $result['shopingCartTable'] = $this->renderAjax('@frontend/views/site/pages/_shopping_table');
        }

        return $this->asJson($result);
    }
}