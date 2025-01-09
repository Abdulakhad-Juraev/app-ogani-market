<?php

namespace frontend\controllers;

use backend\models\Category;
use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogCategory;
use common\modules\blog\models\BlogTags;
use common\modules\blog\models\Tags;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;

class BlogController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $search = Yii::$app->request->get('search');

        $query = Blog::find()
            ->limit(6)
            ->orderBy(['id' => SORT_DESC]);


        if ($search) {
            $query->joinWith('translation')
            ->andFilterWhere(['like', 'title', $search])
            ->orFilterWhere(['like', 'content', $search])
            ->orFilterWhere(['like', 'short_desc', $search]);
        }
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

        $blogCategories = BlogCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $blogsRecent,
            'tags' => $tags,
            'blogCategories' => $blogCategories

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
            ->andWhere(['!=', 'id', $blog->id])
            ->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $blogCategories = BlogCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        return $this->render('blog-detail', [
            'blog' => $blog,
            'blogs_rand' => $blogsRand,
            'blogsRecent' => $blogsRecent,
            'tags' => $tags,
            'blogCategories' => $blogCategories
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionBlogCategory($id)
    {

        $model = Blog::find()->andWhere(['id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $model
        ]);


        $blogsRecent = Blog::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $blogCategories = BlogCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        return $this->render('blog-category', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $blogsRecent,
            'tags' => $tags,
            'blogCategories' => $blogCategories
        ]);
    }

    public function actionBlogTags($id)
    {
        $query = Blog::find()
            ->joinWith('blogTags')
            ->andWhere(['blog_tags.tags_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);


        $blogsRecent = Blog::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->all();

        $tags = Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();

        $blogCategories = BlogCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        return $this->render('blog-tags', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $blogsRecent,
            'tags' => $tags,
            'blogCategories' => $blogCategories
        ]);
    }
}