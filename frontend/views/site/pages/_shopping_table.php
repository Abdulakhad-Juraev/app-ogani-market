<?php

use frontend\components\Cart;
use yii\helpers\Url;

$products = Cart::products(true);
?>
<table>
    <thead>
    <tr>
        <th class="shoping__product">Products</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td class="shoping__cart__item">
                <img src="<?= $product->getImage() ?>" alt="">
                <h5><?= $product->name ?></h5>
            </td>
            <td class="shoping__cart__price">
                <?= $product->price ?>
            </td>
            <td class="shoping__cart__quantity">
                <div class="quantity">
                    <div class="pro-qty">
                        <span class="dec qtybtn myDecBtn"
                              data-url="<?= Url::to(['/cart/minus-from-cart', 'id' => $product->id]);?>"
                        >-</span>

                        <input type="text" value="<?= Cart::productCount($product->id) ?>" readonly>

                        <span class="inc qtybtn myIncBtn"
                              data-url="<?= Url::to(['/cart/add-to-cart', 'id' => $product->id]);?>">+</span>
                    </div>
                </div>
            </td>
            <td class="shoping__cart__total">
                <?= Cart::productCount($product->id) * $product->price ?>
            </td>
            <td class="shoping__cart__item__close">
                <span class="icon_close myRemoveBtn" data-url="<?= Url::to(['/cart/remove-from-cart', 'id' => $product->id]);?>"></span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>