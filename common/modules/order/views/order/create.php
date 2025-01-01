<?php

/** @var yii\web\View $this */
/** @var \common\modules\order\model\Order $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Buyurtma', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="order-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
