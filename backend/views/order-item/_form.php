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
    <!--    --><?php /*= $form->field($model, 'order_id')
        ->dropDownList(ArrayHelper::map(Order::find()->all(), 'id', 'id'), [
            'prompt' => 'Order tanlang']); */ ?>

    <?= $form->field($model, 'product_id')
        ->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'), [
            'prompt' => 'Productni tanlang',
            'id' => 'order_item-product-dropdown',
        ]); ?>

    <?= $form->field($model, 'price')->textInput(['id' => 'order_item-price']) ?>

    <?= $form->field($model, 'count')->textInput(['id' => 'order_item-count']) ?>

    <?= $form->field($model, 'total_price')->textInput(['id' => 'order_item-total-price']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#order_item-product-dropdown").change(function () {
            let productId = $(this).val();

            $.get('/admin/product/price', {id: productId}, function (data) {
                // Log the response to check the result
                console.log(data);

                if (data.success) {
                    // Update the price field with the product's price
                    $('#order_item-price').val(data.data.price); // Assuming `price` is the attribute you want to show
                } else {
                    alert(data.message || 'Product not found');
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                alert('An error occurred while processing the request.');
            });
        });
    });


</script>