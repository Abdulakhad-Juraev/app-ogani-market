<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BlogTags $model */

$this->title = 'Create Blog Tags';
$this->params['breadcrumbs'][] = ['label' => 'Blog Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
