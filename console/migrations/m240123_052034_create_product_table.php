<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240123_052034_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'is_stock' => $this->boolean(),
            'start_count' => $this->integer(),
        ]);

        $this->createTable('{{%product_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(),
            'characteristics' => $this->string(),
            'description' => $this->string(),
            'info' => $this->string(),
            'reviews' => $this->string(),
            'slug' => $this->string(),
        ]);

        $this->addForeignKey('fk_product_lang',
            '{{%product_lang}}', 'owner_id',
            '{{%product}}', 'id',
            'CASCADE', 'CASCADE');

        $this->addForeignKey('fk_category_with_product',
            '{{%product}}', 'category_id',
            '{{%category}}', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_with_product','{{%product}}');
        $this->dropForeignKey('fk_product_lang','{{%product_lang}}');
        $this->dropTable('{{%product_lang}}');
        $this->dropTable('{{%product}}');
    }
}
