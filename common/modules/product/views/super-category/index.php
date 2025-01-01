<?php

use backend\views\GridComponent;
use common\modules\product\models\search\SuperCategorySearch;
use common\modules\product\models\SuperCategory;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var SuperCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Super Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="super-category-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->renderCategoriesWithSubcategories($model);
                        }
                    ],
                    [
                        'attribute' => 'parent_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $badgeClass = $model->parent ? 'badge-secondary p-1' : 'badge-primary p-1';
                            $badgeText = $model->parent ? ($model->parent->name . " <div class='badge badge-warning ml-1 p-1'>sub-categoriya</div>") : 'Super kategoriya';
                            return Html::tag('div', $badgeText, ['class' => "badge  $badgeClass"]);

                        }
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
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, SuperCategory $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
