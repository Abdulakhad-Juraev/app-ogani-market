<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog_category}}`.
 */
class m240125_015720_create_blog_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_category}}', [
            'id' => $this->primaryKey(),
        ]);

        $this->createTable('{{%blog_category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string()
        ]);

        $this->addForeignKey('fk_blog_category_lang',
            '{{%blog_category_lang}}', 'owner_id',
            '{{%blog_category}}', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_blog_category_lang','{{%blog_category_lang}}');
        $this->dropTable('{{%blog_category_lang}}');
        $this->dropTable('{{%blog_category}}');
    }
}
