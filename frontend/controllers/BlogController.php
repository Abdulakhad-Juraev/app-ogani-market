<?php

namespace frontend\controllers;

use backend\models\Blog;
use backend\models\Category;
use backend\models\Tags;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex()
    {

        $query = Blog::find()
            ->limit(6)
            ->orderBy(['id' => SORT_DESC]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 8
            ]
        ]);


        $blogsRecent = Blog::find()
            ->limit(3)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $categories = Category::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->where(['status' => 1])
            ->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $blogsRecent,
            'tags' => $tags,
            'categories' => $categories

        ]);
    }

    public function actionBlogDetail($slug)
    {

        $blog = Blog::findOne(['slug' => $slug]);

        $blogsRand = Blog::find()
            ->andWhere(['!=', 'id', $blog->id])
            ->orderBy(new Expression('rand()'))
            ->limit(3)
            ->all();

        $blogsRecent = Blog::find()
            ->limit(3)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $categories = Category::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->where(['status' => 1])
            ->all();

        return $this->render('blog-detail', [
            'blog' => $blog,
            'blogs_rand' => $blogsRand,
            'blogsRecent' => $blogsRecent,
            'tags' => $tags,
            'categories' => $categories
        ]);
    }
}