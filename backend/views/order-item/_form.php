<?php

use backend\models\Order;
use backend\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'order_id')
        ->dropDownList(ArrayHelper::map(Order::find()->all(), 'id', 'id'), [
            'prompt' => 'Order tanlang']); ?>

    <?= $form->field($model, 'product_id')
        ->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'), [
            'prompt' => 'Order tanlang']); ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'total_price')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
