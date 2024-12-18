<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`.
 */
class m240125_055915_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date(),
            'category_id' => $this->integer(),
            'slug' => $this->string(),
        ]);

        $this->createTable('{{%blog_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(),
            'short_desc' => $this->string(),
            'content' => $this->string()
        ]);

        $this->addForeignKey('fk_blog_lang',
            '{{%blog_lang}}', 'owner_id',
            '{{%blog}}', 'id',
            'CASCADE', 'CASCADE');

        $this->addForeignKey('fk_blog_with_category_blog',
            '{{%blog}}', 'category_id',
            '{{%blog_category}}', 'id',
            'CASCADE', 'CASCADE');
    }

    function safeDown()
    {
        $this->dropForeignKey('fk_blog_lang', '{{%blog_lang}}');
        $this->dropForeignKey('fk_blog_with_category_blog', '{{%blog}}');
        $this->dropTable('{{%blog_lang}}');
        $this->dropTable('{{%blog}}');
    }
}
