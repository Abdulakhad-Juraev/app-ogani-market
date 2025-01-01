<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OrderItem $model */

$this->title = 'Create';
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

