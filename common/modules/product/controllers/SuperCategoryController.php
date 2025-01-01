<?php

namespace common\modules\product\controllers;

use common\modules\product\models\search\SuperCategorySearch;
use common\modules\product\models\SuperCategory;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
    public function actionIndex()
    {
        $searchModel = new SuperCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
        $model = new SuperCategory([
            'status' => 1
        ]);

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

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // Subkategoriya o'zining yuqori darajadagi kategoriyasini parent qilishga harakat qilayotganini tekshirish
            if ($this->isParentCircular($model->parent_id, $model->id)) {
                Yii::$app->session->setFlash('error', 'Kategoriya parent sifatida o\'zini o\'zi belgilay olmaydi.');
                return $this->refresh();
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

// Recursive tekshirish: parent_id orqali tsiklni oldini olish
    private function isParentCircular($parentId, $categoryId)
    {
        // Agar parent_id mavjud bo'lsa
        while ($parentId) {
            $parentCategory = SuperCategory::findOne($parentId);

            // Agar parent bo'lmasa yoki parent_id kategoriya o'ziga teng bo'lsa, tsikl bo'ladi
            if (!$parentCategory || $parentCategory->id == $categoryId) {
                return true;
            }

            // Yangi parent_id ga o'tish
            $parentId = $parentCategory->parent_id;
        }

        return false;
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
     * @return \common\modules\product\models\SuperCategory the loaded model
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
