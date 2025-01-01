<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var \common\modules\order\model\OrderItem $model */

$this->title = "View: " . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Buyurtma qo\'shimchalari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="order-item-view">
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
                    'order_id',
                    [
                        'attribute' => 'product_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->product->name ?? '';
                        }
                    ],
                    'price',
                    'count',
                    'total_price',
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
