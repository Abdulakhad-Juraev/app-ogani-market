<?php

use yii\db\Migration;

/**
 * Class m250116_025548_batch_add_product
 */
class m250116_025548_batch_add_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $productTable = '{{%product}}';
    public $galleryImageTable = '{{%gallery_image}}';

    /**
     * @throws \yii\db\Exception
     */
    protected function getProductIds()
    {
        return Yii::$app->db->createCommand('SELECT id FROM ' . $this->productTable)
            ->queryColumn(); // This will return an array of IDs directly
    }

    /**
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $this->batchInsert($this->productTable, ['super_category_id', 'bundle_category_id', 'is_stock', 'start_count', 'price', 'name', 'slug'], [
            [1, 2, 1, 5, 1000, 'Apple', 'apple'],
            [1, 1, 1, 3, 2000, 'Banana', 'banana'],
            [2, 2, 1, 3, 1500, 'Carrot', 'carrot'],
            [2, 1, 1, 1, 500, 'Cucumber', 'cucumber'],
        ]);

        // Step 2: Get product IDs using the helper function
        $productIds = $this->getProductIds(); // Now this fetches the product IDs dynamically

        // Step 3: Batch Insert into Gallery Image table for each product
        $galleryImages = [];
        foreach ($productIds as $productId) {
            $galleryImages[] = ['product', $productId, 0, "Image for product {$productId} - 1", 'Description for image 1'];
            $galleryImages[] = ['product', $productId, 1, "Image for product {$productId} - 2", 'Description for image 2'];
        }

        // Insert gallery images into gallery_image table
        $this->batchInsert($this->galleryImageTable, ['type', 'ownerId', 'rank', 'name', 'description'], $galleryImages);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250116_025548_batch_add_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250116_025548_batch_add_product cannot be reverted.\n";

        return false;
    }
    */
}
