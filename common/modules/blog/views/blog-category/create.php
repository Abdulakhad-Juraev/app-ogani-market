<?php

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\BlogCategory $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Blog kategoriyasi', 'url' => ['index']];
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
