<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DiscountSuperCategory $model */

$this->title = 'Create Discount Super Category';
$this->params['breadcrumbs'][] = ['label' => 'Discount Super Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-super-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
