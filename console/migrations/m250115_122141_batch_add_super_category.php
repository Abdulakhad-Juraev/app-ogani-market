<?php

use yii\db\Migration;

/**
 * Class m250115_122141_batch_add_super_category
 */
class m250115_122141_batch_add_super_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Batch insert example data into the super_category table
        $this->batchInsert('{{%super_category}}', ['image', 'status', 'is_favorite', 'slug', 'created_at', 'updated_at'], [
            ['678b4b33410d0.jpg', 1, true, 'electronics', time(), time()],
            ['678b4ca880c89.jpg', 1, false, 'furniture', time(), time()],
            ['678b4cdbbc06f.jpg', 1, true, 'clothing', time(), time()],
            ['678b4be44a92d.jpg', 1, true, 'electronics', time(), time()],
            ['678b4d1516243.jpg', 1, true, 'electronics', time(), time()],
        ]);
//        $this->execute("SELECT * FROM {{%super_category}}");
        // Batch insert example data into the super_category_lang table (in English and French)
        $this->batchInsert('{{%super_category_lang}}', ['owner_id', 'language', 'name'], [
            [1, 'en', 'Fruits'],
            [1, 'uz', 'Mevalar'],
            [2, 'en', 'Vegetables'],
            [2, 'uz', 'Sabzavotlar'],
            [3, 'en', 'Herbs'],
            [3, 'uz', 'O\'tlar'],
            [4, 'en', 'Yangi mevalar'],
            [4, 'uz', 'O\'tlar'],
            [5, 'en', 'Vegetables'],
            [5, 'uz', 'Sabzavotlar'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250115_122141_batch_add_super_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250115_122141_batch_add_super_category cannot be reverted.\n";

        return false;
    }
    */
}
