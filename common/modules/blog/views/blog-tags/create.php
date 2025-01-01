<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\BlogTags $model */

$this->title = 'Blog va Teg';
$this->params['breadcrumbs'][] = ['label' => 'Blog va Teg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-tags-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
