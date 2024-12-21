<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\SuperCategory $model */

$this->title = 'Create Super Category';
$this->params['breadcrumbs'][] = ['label' => 'Super Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="super-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
