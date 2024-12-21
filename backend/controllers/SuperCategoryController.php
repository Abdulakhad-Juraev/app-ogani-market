<?php

namespace backend\controllers;

use backend\models\SuperCategory;
use backend\models\search\SuperCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SuperCategoryController implements the CRUD actions for SuperCategory model.
 */
class SuperCategoryController extends Controller
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
     * Lists all SuperCategory models.
     *
     * @return string
     */
//    public function actionIndex()
//    {
//       /* $searchModel = new SuperCategorySearch();
//        $dataProvider = $searchModel->search($this->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);*/
//
//        $categories = SuperCategory::find()->where(['parent_id' => null])->all();
//        return $this->render('index', ['categories' => $categories]);
//    }

    public function actionIndex()
    {
        // Hierarxiyani tekis ro'yxatga aylantirish
        $categories = SuperCategory::find()->where(['parent_id' => null])->all();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $this->prepareHierarchy($categories),
            'pagination' => false, // Hierarxik tuzilma uchun pagination ishlatilmaydi
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Hierarxiyani tekis ro'yxatga aylantiruvchi yordamchi metod
     */
    private function prepareHierarchy($categories, $level = 0)
    {
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->id,
                'name' => str_repeat('--', $level) . $category->name,
                'parent_id' => $category->parent_id,
            ];
            $data = array_merge($data, $this->prepareHierarchy($category->children, $level + 1));
        }
        return $data;
    }
    /**
     * Displays a single SuperCategory model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuperCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SuperCategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuperCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SuperCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuperCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SuperCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuperCategory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
