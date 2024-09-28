<?php

namespace frontend\controllers;

use backend\models\Blog;
use backend\models\Category;
use backend\models\Product;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    /**

     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($slug)
    {
        $category = Category::findOne(['slug' => $slug]);

        if (!$category) {
            throw new NotFoundHttpException("Category not found!");
        }



        $products = $category->getProducts()
            ->orderBy(['id' => SORT_DESC])
            ->all();

        $query = $category->getProducts()
            ->orderBy(['id' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 15
            ]
        ]);

        return $this->render('index', ['category' => $category, 'dataProvider' => $dataProvider]);
    }

}