<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BlogCategory $model */

$this->title = 'Create Blog Category';
$this->params['breadcrumbs'][] = ['label' => 'Blog Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-category-create">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
