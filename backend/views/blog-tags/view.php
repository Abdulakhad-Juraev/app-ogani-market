<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\BlogTags $model */

$this->title = $model->blog_id;
$this->params['breadcrumbs'][] = ['label' => 'Blog Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blog-tags-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'blog_id',
            'tags_id',
        ],
    ]) ?>

</div>
