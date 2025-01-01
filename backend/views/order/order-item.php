<?php

use backend\models\Order;
use backend\models\OrderItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var Order $model */
/** @var yii\web\View $this */
/** @var backend\models\search\OrderItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Buyurtma qo\'shimchalari';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_tab-menu', ['model' => $model]); ?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="order-item-index">

            <p>
                <?= Html::a('+', ['/order-item/create', 'order_id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'order_id',
                    [
                        'attribute' => 'product_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->product->name ?? '';
                        }
                    ],
                    'count',
                    'price',
                    'total_price',
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i:s']
                    ],
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, OrderItem $model, $key, $index, $column) {
                            return Url::toRoute(['/order-item/' . $action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>
