<?php

namespace backend\controllers;

use backend\models\DiscountSuperCategory;
use backend\models\search\DiscountSuperCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiscountSuperCategoryController implements the CRUD actions for DiscountSuperCategory model.
 */
class DiscountSuperCategoryController extends Controller
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
     * Lists all DiscountSuperCategory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DiscountSuperCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DiscountSuperCategory model.
     * @param int $discount_id Discount ID
     * @param int $super_category_id Super Category ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($discount_id, $super_category_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($discount_id, $super_category_id),
        ]);
    }

    /**
     * Creates a new DiscountSuperCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DiscountSuperCategory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DiscountSuperCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $discount_id Discount ID
     * @param int $super_category_id Super Category ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($discount_id, $super_category_id)
    {
        $model = $this->findModel($discount_id, $super_category_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DiscountSuperCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $discount_id Discount ID
     * @param int $super_category_id Super Category ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($discount_id, $super_category_id)
    {
        $this->findModel($discount_id, $super_category_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DiscountSuperCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $discount_id Discount ID
     * @param int $super_category_id Super Category ID
     * @return DiscountSuperCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($discount_id, $super_category_id)
    {
        if (($model = DiscountSuperCategory::findOne(['discount_id' => $discount_id, 'super_category_id' => $super_category_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
