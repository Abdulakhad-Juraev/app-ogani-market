<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\modules\discount\models\DiscountSuperCategory $model */

$this->title = 'Update: ' . $model->discount_id;
$this->params['breadcrumbs'][] = ['label' => 'Chegirma va Super kategoriya', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->discount_id, 'url' => ['view', 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card card-outline card-primary">
    <div class="card-body">
<div class="discount-super-category-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
