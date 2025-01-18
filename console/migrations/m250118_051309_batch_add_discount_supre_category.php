<?php

use yii\db\Migration;

/**
 * Class m250118_051309_batch_add_discount_supre_category
 */
class m250118_051309_batch_add_discount_supre_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            '{{%discount_super_category}}',
            ['discount_id', 'super_category_id'], // Column names
            [
                [1, 3],  // discount_id 1, super_category_id 5
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250118_051309_batch_add_discount_supre_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250118_051309_batch_add_discount_supre_category cannot be reverted.\n";

        return false;
    }
    */
}
