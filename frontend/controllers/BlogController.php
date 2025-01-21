<?php

namespace frontend\controllers;

use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogCategory;
use common\modules\blog\models\Tags;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
            'pagination' => ['defaultPageSize' => 8]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $this->getRecentBlogs(),
            'tags' => $this->getTags(),
            'blogCategories' => $this->getBlogCategories()

        ]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionBlogDetail($slug)
    {

        $blog = Blog::findOne(['slug' => $slug]);

        if (!$blog){
            throw new NotFoundHttpException("Blog not found!");
        }
        $blogsRand = Blog::find()
            ->andWhere(['!=', 'id', $blog->id])
            ->orderBy(new Expression('rand()'))
            ->limit(3)
            ->all();

        return $this->render('blog-detail', [
            'blog' => $blog,
            'blogs_rand' => $blogsRand,
            'blogsRecent' => $this->getRecentBlogs(),
            'tags' => $this->getTags(),
            'blogCategories' => $this->getBlogCategories()
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

        return $this->render('blog-category', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $this->getRecentBlogs(),
            'tags' => $this->getTags(),
            'blogCategories' => $this->getBlogCategories()
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

        return $this->render('blog-tags', [
            'dataProvider' => $dataProvider,
            'blogsRecent' => $this->getRecentBlogs(),
            'tags' => $this->getTags(),
            'blogCategories' => $this->getBlogCategories()
        ]);
    }

    /**
     * @return array|ActiveRecord[]
     */
    protected function getRecentBlogs()
    {
        return Blog::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->all();
    }

    /**
     * @return array|ActiveRecord[]
     */
    protected function getTags()
    {
        return Tags::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(10)
            ->all();
    }

    /**
     * @return array|ActiveRecord[]
     */
    protected function getBlogCategories()
    {
        return BlogCategory::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();
    }

}