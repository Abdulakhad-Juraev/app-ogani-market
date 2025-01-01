<?php

use common\modules\discount\models\DiscountSuperCategory;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var DiscountSuperCategory $model */

$this->title = "View: ".$model->discount_id;
$this->params['breadcrumbs'][] = ['label' => 'Chegirma va Super kategoriya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-super-category-view">
            <p>
                <?= Html::a('Update', ['update', 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id], [
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
                ],
            ]) ?>

        </div>
    </div>
</div>
