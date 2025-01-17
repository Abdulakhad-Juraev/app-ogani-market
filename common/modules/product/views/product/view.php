<?php

use backend\views\GridComponent;
use common\modules\product\models\Product;
use common\modules\product\models\ProductGallery;
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
                    ['attribute' => 'bundle_category_id',
                        'value' => function ($d) {
                            return $d->bundleSuperCategory->name ?? '';
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
//                    [
//                        'attribute' => 'image',
//                        'label'=>'Rasm',
//                        'format' => 'raw',
//                        'value' => function ($model) {
//                            $images = ProductGallery::find()->andWhere(['product_id' => $model->id])->all();
//                            if ($images) {
//                                $html = '<div class="product-images">';
//                                foreach ($images as $image) {
//                                    $html .= Html::img($image->file_path, [
//                                        'alt' => 'Product image',
//                                        'class' => 'product-image img-thumbnail',
//                                        'style' => 'width:40px'
//                                    ]);
//                                }
//                                $html .= '</div>';
//                                return $html;
//                            } else {
//                                return '<p>Bu mahsulotga tegishli rasmlar mavjud emas.</p>';
//                            }
//                        },
//                    ],
                    [
                        'attribute' => 'images',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $images = ProductGallery::find()->andWhere(['product_id' => $model->id])->all();  // Access the images associated with this product

                            if ($images) {
                                $html = '<div class="product-images">';
                                foreach ($images as $image) {
                                    $html .= Html::img($image->file_path, [
                                            'alt' => 'Product image',
                                            'class' => 'product-image img-thumbnail',
                                            'style' => 'width:40px'
                                        ]) . ' ';
                                    // Add a delete button next to each image
                                    $html .= Html::a(
                                        '<i class="fa fa-trash"></i>',
                                        ['delete-image', 'imageId' => $image->id],
                                        [
                                            'class' => 'badge badge-danger',
                                            'title' => 'Delete Image',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this image?',
                                                'method' => 'post',
                                            ],
                                        ]
                                    );
                                }
                                $html .= '</div>';
                                return $html;
                            } else {
                                return '<p>Bu mahsulotga tegishli rasmlar mavjud emas.</p>';
                            }
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>

