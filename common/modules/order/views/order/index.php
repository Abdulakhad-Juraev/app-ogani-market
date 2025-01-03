<?php

use backend\views\GridComponent;
use common\modules\order\model\Order;
use common\modules\order\model\search\OrderSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Buyurtmalar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="order-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return (($model->user->id) . "| |" . ($model->user->username)) ?? '';
                        },

                    ],
                    [
                        'attribute' => 'full_name',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return (($model->user->userContact->firstname) . "  " . ($model->user->userContact->lastname)) ?? '';
                        },
                    ],

                    [
                        'attribute' => 'phone_number',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->user->userContact->phone ?? '';
                        },
                    ],
                    [
                        'attribute' => 'payment_type',
                        'filter' => Order::orderPaymentTypes(),
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->paymentTypeName ?? '';
                        },

                    ],
                    [
                        'attribute' => 'order_type',
                        'filter' => Order::orderTypes(),
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->typeName ?? '';
                        },

                    ],
                    [
                        'attribute' => 'total_price',
                        'value' => function ($model) {
                            return $model->allPrice ?? '';
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
                    //'created_at',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>