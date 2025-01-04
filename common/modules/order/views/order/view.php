<?php

use backend\views\GridComponent;
use common\modules\order\model\Order;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var Order $model */

$this->title = "View: " . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<?= $this->render('_tab-menu', ['model' => $model]); ?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="order-view">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return (($model->user->id ?? '') . "| |" . ($model->user->username ?? ''));
                        },

                    ],
                    'full_name',
                    'phone_number',
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
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->status);
                        },

                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d H:i:s']
                    ],
                    [
                        'attribute' => 'created_by',
                        'value' => function ($model) {
                            return $model->createdBy->username ?? '';
                        }
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d H:i:s']
                    ],
                    [
                        'attribute' => 'updated_by',
                        'value' => function ($model) {
                            return $model->updatedBy->username ?? '';
                        }
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
