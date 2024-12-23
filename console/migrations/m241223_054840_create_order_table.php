<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m241223_054840_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'full_name' => $this->string(),
            'phone_number' => $this->string(),
            'payment_type' => $this->integer(),
            'order_type' => $this->integer(),
            'total_price' => $this->float(),
            'status' => $this->tinyInteger(),

            'created_at' => $this->bigInteger()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_order_user_id',
            '{{%order}}', 'user_id',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE');

        $this->addForeignKey(
            'fk_order_created_by',
            '{{%order}}', 'created_by',
            '{{%user}}', 'id',
            'CASCADE','CASCADE'
        );

        $this->addForeignKey(
            'fk_order_updated_by',
            '{{%order}}', 'updated_by',
            '{{%user}}', 'id',
            'CASCADE','CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_updated_by','order');
        $this->dropForeignKey('fk_order_created_by','order');
        $this->dropForeignKey('fk_order_user_id','order');
        $this->dropTable('{{%order}}');
    }
}
