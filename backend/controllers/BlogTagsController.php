<?php

namespace backend\controllers;

use backend\models\BlogTags;
use backend\models\search\BlogTagsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogTagsController implements the CRUD actions for BlogTags model.
 */
class BlogTagsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all BlogTags models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BlogTagsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlogTags model.
     * @param int $blog_id Blog ID
     * @param int $tags_id Tags ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($blog_id, $tags_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($blog_id, $tags_id),
        ]);
    }

    /**
     * Creates a new BlogTags model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BlogTags();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BlogTags model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $blog_id Blog ID
     * @param int $tags_id Tags ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($blog_id, $tags_id)
    {
        $model = $this->findModel($blog_id, $tags_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BlogTags model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $blog_id Blog ID
     * @param int $tags_id Tags ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($blog_id, $tags_id)
    {
        $this->findModel($blog_id, $tags_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BlogTags model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $blog_id Blog ID
     * @param int $tags_id Tags ID
     * @return BlogTags the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($blog_id, $tags_id)
    {
        if (($model = BlogTags::findOne(['blog_id' => $blog_id, 'tags_id' => $tags_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
