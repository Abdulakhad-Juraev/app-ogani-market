<?php

use backend\views\GridComponent;
use common\modules\product\models\Product;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mahsulotlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="card card-outline card-primary">
    <div class="card-body">
<div class="product-view">

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
            ['attribute' => 'super_category_id',
                'value' => function ($d) {
                    return $d->superCategory->name ?? '';
                }],
            'slug',
            'price',
            'start_count',
            'name',
            'characteristics',
            'info',
            'reviews',
            'description',
            [
                'attribute' => 'is_stock',
                'format' => 'raw',
                'value' => function ($model) {
                    return GridComponent::getStatusHtml($model->is_stock);
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return GridComponent::getStatusHtml($model->status);
                }
            ],

        ],
    ]) ?>

</div>
</div>
</div>
