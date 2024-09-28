<?php

namespace frontend\controllers;

use backend\models\Blog;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex()
    {
        $blogs = Blog::find()
            ->limit(6)
            ->orderBy(['id' => SORT_DESC])
            ->all();

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



        return $this->render('index', ['dataProvider' => $dataProvider,'blogsRecent'=>$blogsRecent]);
    }
    public function actionBlogDetail($slug)
    {
        $blogsRand = Blog::find()
            ->orderBy(new Expression('rand()'))
            ->limit(3)
            ->all();
        $blogsRecent = Blog::find()
            ->limit(3)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        $blog = Blog::findOne(['slug' => $slug]);
        return $this->render('blog-detail', [
            'blog' => $blog,
            'blogs_rand' => $blogsRand,
            'blogsRecent'=>$blogsRecent
        ]);
    }
}