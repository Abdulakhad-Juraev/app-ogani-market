<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m240122_114246_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'status' => $this->tinyInteger(),
            'is_favorite'=>$this->boolean()
        ]);

        $this->createTable('{{%category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(),
            'slug' => $this->string()
        ]);

        $this->addForeignKey('fk_category_lang', '{{%category_lang}}', 'owner_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_lang','{{%category_lang}}');

        $this->dropTable('{{%category_lang}}');
        $this->dropTable('{{%category}}');
    }
}
