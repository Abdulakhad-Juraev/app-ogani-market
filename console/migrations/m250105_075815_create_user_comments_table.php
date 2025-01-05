<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_comments}}`.
 */
class m250105_075815_create_user_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_comments}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),
            'message' => $this->text(),

            'created_at' => $this->bigInteger()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_user_comments_user_id',
            '{{%user_comments}}', 'user_id',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_comments_product_id',
            '{{%user_comments}}', 'product_id',
            '{{%product}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_comments_created_by',
            '{{%user_comments}}', 'created_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_comments_updated_by',
            '{{%user_comments}}', 'updated_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_comments_updated_by','user_comments');
        $this->dropForeignKey('fk_user_comments_created_by','user_comments');
        $this->dropForeignKey('fk_user_comments_product_id','user_comments');
        $this->dropForeignKey('fk_user_comments_user_id','user_comments');
        $this->dropTable('{{%user_comments}}');
    }
}
