<?php

use backend\models\Order;
use backend\views\GridComponent;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Order $model */

$this->title = "View: " . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

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
                            return (($model->user->id) . "| |" . ($model->user->username)) ?? '';
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
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->status);
                        },

                    ],
                    'created_at',
                    'created_by',
                    'updated_at',
                    'updated_by',
                ],
            ]) ?>

        </div>
    </div>
</div>
