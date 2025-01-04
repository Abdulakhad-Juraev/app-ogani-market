<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_products}}`.
 */
class m250104_121838_create_user_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_products}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),

            'created_at' => $this->bigInteger()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
            'updated_by' => $this->integer()->notNull(),

        ]);

        $this->addForeignKey(
            'fk_user_products_user_id',
            '{{%user_products}}', 'user_id',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_products_product_id',
            '{{%user_products}}', 'product_id',
            '{{%product}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_products_created_by',
            '{{%user_products}}', 'created_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_products_updated_by',
            '{{%user_products}}', 'updated_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_products_updated_by','user_products');
        $this->dropForeignKey('fk_user_products_created_by','user_products');
        $this->dropForeignKey('fk_user_products_product_id','user_products');
        $this->dropForeignKey('fk_user_products_user_id','user_products');
        $this->dropTable('{{%user_products}}');
    }
}
