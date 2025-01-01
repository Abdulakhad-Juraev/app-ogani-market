<?php

use common\modules\discount\models\DiscountSuperCategory;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \common\modules\discount\models\search\DiscountSuperCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Chegirma va Super kategoriya';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-super-category-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'discount_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->discount->name ?? '';
                        }
                    ],
                    [
                        'attribute' => 'super_category_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->superCategory->name ?? '';
                        }
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, DiscountSuperCategory $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>
