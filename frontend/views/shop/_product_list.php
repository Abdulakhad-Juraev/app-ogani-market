<?php foreach ($products as $product): ?>
    <div class="product-item">
        <img src="<?= $product->image ?>" alt="<?= $product->name ?>" />
        <h3><?= $product->name ?></h3>
        <p><?= $product->price ?> USD</p>
        <!-- Add more product details here -->
    </div>
<?php endforeach; ?>
