<?php

use yii\db\Migration;

/**
 * Class m250115_121127_batch_add_discount
 */
class m250115_121127_batch_add_discount extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%discount}}', ['name', 'percentage', 'status'], [
            ['New Year Discount', '20',1],
            ['Black Friday Sale', '50', 0],
            ['Winter Clearance', '30', 0],
            ['Spring Promotion', '15', 0],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250115_121127_batch_add_discount cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250115_121127_batch_add_discount cannot be reverted.\n";

        return false;
    }
    */
}
