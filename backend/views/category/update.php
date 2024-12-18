<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Category $model */

$this->title = 'Update Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="category-update">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
        </div>
        </div>
