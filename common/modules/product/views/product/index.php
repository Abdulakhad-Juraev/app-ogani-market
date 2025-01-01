<?php

use backend\views\GridComponent;
use common\modules\product\models\search\ProductSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="product-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    ['attribute' => 'super_category_id',
                        'value' => function ($d) {
                            return $d->superCategory->name ?? '';
                        }],
                    'start_count',
                    'price',
                    [
                        'attribute' => 'is_stock',
                        'filter'=>GridComponent::getStatusFilterOptions(),
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->is_stock);
                        }
                    ],
                    [
                        'attribute' => 'status',
                        'filter'=>GridComponent::getStatusFilterOptions(),
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->status);
                        }
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{image} {view} {update} {delete} ',
                        'buttons' => [
                            'image' => function ($url, $model, $key) {
                                $icon = Html::tag('span', '', ['class' => 'fas fa-image']);

                                return Html::a($icon, ['product/image', 'id' => $model->id], [
                                    'title' => Yii::t('yii', 'Upload'),
                                ]);
                            },
                        ],
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>
