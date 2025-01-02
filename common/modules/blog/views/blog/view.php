<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\Blog $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= $this->render('_tab-menu', ['model' => $model]); ?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-view">
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
                    'title_uz',
                    'title_en',
                    'short_desc_uz',
                    'short_desc_en',
                    'content_uz',
                    'content_en',
                    [
                        'attribute' => 'category_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->category->name ?? '';
                        },
                    ],
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return "<img src={$model->imageUrl} alt='image' style='width:40px'>";
                        },
                    ],
                    'slug',
                    [
                        'attribute' => 'date',
                        'format' => ['date', 'php:Y-m-d H:i:s']
                    ]
                ],
            ]) ?>

        </div>
    </div>
</div>
