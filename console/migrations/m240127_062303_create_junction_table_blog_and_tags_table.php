<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog_tags}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%blog}}`
 * - `{{%tags}}`
 */
class m240127_062303_create_junction_table_blog_and_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_tags}}', [
            'blog_id' => $this->integer(),
            'tags_id' => $this->integer(),
            'PRIMARY KEY(blog_id, tags_id)',
        ]);

        // creates index for column `blog_id`
        $this->createIndex(
            '{{%idx-blog_tags-blog_id}}',
            '{{%blog_tags}}',
            'blog_id'
        );

        // add foreign key for table `{{%blog}}`
        $this->addForeignKey(
            '{{%fk-blog_tags-blog_id}}',
            '{{%blog_tags}}',
            'blog_id',
            '{{%blog}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tags_id`
        $this->createIndex(
            '{{%idx-blog_tags-tags_id}}',
            '{{%blog_tags}}',
            'tags_id'
        );

        // add foreign key for table `{{%tags}}`
        $this->addForeignKey(
            '{{%fk-blog_tags-tags_id}}',
            '{{%blog_tags}}',
            'tags_id',
            '{{%tags}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%blog}}`
        $this->dropForeignKey(
            '{{%fk-blog_tags-blog_id}}',
            '{{%blog_tags}}'
        );

        // drops index for column `blog_id`
        $this->dropIndex(
            '{{%idx-blog_tags-blog_id}}',
            '{{%blog_tags}}'
        );

        // drops foreign key for table `{{%tags}}`
        $this->dropForeignKey(
            '{{%fk-blog_tags-tags_id}}',
            '{{%blog_tags}}'
        );

        // drops index for column `tags_id`
        $this->dropIndex(
            '{{%idx-blog_tags-tags_id}}',
            '{{%blog_tags}}'
        );

        $this->dropTable('{{%blog_tags}}');
    }
}
