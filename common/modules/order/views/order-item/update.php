<?php

/** @var yii\web\View $this */
/** @var \common\modules\order\model\OrderItem $model */

$this->title = 'Update: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Buyurtma qo\'shimchalari', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="order-item-update">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>

