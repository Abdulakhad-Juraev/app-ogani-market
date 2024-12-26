<?php

use backend\models\Category;
use backend\views\GridComponent;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \backend\models\search\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .form-control {
        height: 30px;
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="category-index">
            <p>
                <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <style>

            </style>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return "<img src=/uploads/'{$model->image}'>";
                        },

                    ],
                    [
                        'attribute' => 'status',
                        'filter' => GridComponent::getStatusFilterOptions(),
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->status);
                        },

                    ],
                    [
                        'attribute' => 'is_favorite',
                        'filter' => GridComponent::getStatusFilterOptions(),
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->is_favorite);
                        }
                    ],

                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]);
            ?>


        </div>
    </div>
</div>