<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tags}}`.
 */
class m240125_024056_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
        ]);

        $this->createTable('{{%tags_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string()
        ]);

        $this->addForeignKey('fk_tags_lang',
            '{{%tags_lang}}', 'owner_id',
            '{{%tags}}', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tags_lang','{{%tags_lang}}');
        $this->dropTable('{{%tags_lang}}');
        $this->dropTable('{{%tags}}');
    }
}
