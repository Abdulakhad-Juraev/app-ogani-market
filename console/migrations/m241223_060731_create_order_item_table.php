<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 */
class m241223_060731_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
            'price' => $this->float(),
            'total_price' => $this->float(),

            'created_at' => $this->bigInteger()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_order_item_order_id',
            '{{%order_item}}', 'order_id',
            '{{%order}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_order_item_product_id',
            '{{%order_item}}', 'product_id',
            '{{%product}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_order_item_created_by',
            '{{%order_item}}', 'created_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_order_item_updated_by',
            '{{%order_item}}', 'updated_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_item_updated_by', 'order_item');
        $this->dropForeignKey('fk_order_item_created_by', 'order_item');
        $this->dropForeignKey('fk_order_item_order_id', 'order_item');
        $this->dropTable('{{%order_item}}');
    }
}
