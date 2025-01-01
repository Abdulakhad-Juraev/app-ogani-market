<?php

/** @var yii\web\View $this */
/** @var \common\modules\order\model\OrderItem $model */

$this->title = 'Create Buyurtma qo\'shimchalari';
$this->params['breadcrumbs'][] = ['label' => 'Buyurtma qo\'shimchalari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
<div class="order-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>

