<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 */
class m241228_163517_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'image' => $this->string(),
            'status' => $this->tinyInteger(),

            'created_at' => $this->bigInteger()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_social_created_by',
            '{{%social}}', 'created_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_social_updated_by',
            '{{%social}}', 'updated_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social}}');
    }
}
