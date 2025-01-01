<?php

use common\modules\product\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OrderItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-item-form">

    <?php $form = ActiveForm::begin(); ?>
    <!--    --><?php /*= $form->field($model, 'order_id')
        ->dropDownList(ArrayHelper::map(Order::find()->all(), 'id', 'id'), [
            'prompt' => 'Order tanlang']); */ ?>

    <?= $form->field($model, 'product_id')
        ->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'), [
            'prompt' => 'Productni tanlang',
            'id' => 'order_item-product-dropdown',
        ]); ?>

    <?= $form->field($model, 'price')->textInput(['id' => 'order_item-price', 'readonly' => true]) ?>

    <?= $form->field($model, 'count')->textInput(['id' => 'order_item-count']) ?>

    <?= $form->field($model, 'total_price')->textInput(['id' => 'order_item-total-price', 'readonly' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>