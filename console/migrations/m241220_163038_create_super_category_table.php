<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%super_category}}`.
 */
class m241220_163038_create_super_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%super_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_id' => $this->integer()->defaultValue(null),
        ]);

        $this->addForeignKey(
            'fk-supercategory-parent_id',
            'super_category',
            'parent_id',
            'super_category',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-supercategory-parent_id', '{{%super_category}}');
        $this->dropTable('{{%super_category}}');
    }
}
