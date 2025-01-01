<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\BlogTags $model */

$this->title = $model->blog->title ?? $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blog va Teg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-tags-view">
            <p>
                <?= Html::a('Update', ['update', 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id], [
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
                        'attribute' => 'blog_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->blog->title ?? '';
                        }
                    ],
                    [
                        'attribute' => 'tags_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->tags->name ?? '';
                        }
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
