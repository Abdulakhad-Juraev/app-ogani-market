<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BlogCategory $model */

$this->title = 'Update Blog Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blog Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-category-update">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
