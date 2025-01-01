<?php

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\Blog $model */

$this->title = 'Update: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-update">


            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>

