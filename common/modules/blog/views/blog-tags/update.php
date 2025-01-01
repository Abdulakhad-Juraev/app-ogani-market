<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\BlogTags $model */

$this->title = 'Update: ' . $model->blog_id;
$this->params['breadcrumbs'][] = ['label' => 'Blog va Teg', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->blog_id, 'url' => ['view', 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-tags-update">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
