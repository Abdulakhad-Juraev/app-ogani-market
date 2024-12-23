<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DiscountSuperCategory $model */

$this->title = 'Update Discount Super Category: ' . $model->discount_id;
$this->params['breadcrumbs'][] = ['label' => 'Discount Super Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->discount_id, 'url' => ['view', 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discount-super-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
