<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discount_super_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%discount}}`
 * - `{{%super_category}}`
 */
class m241222_043252_create_junction_table_discount_and_super_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discount_super_category}}', [
            'discount_id' => $this->integer(),
            'super_category_id' => $this->integer(),
            'PRIMARY KEY(discount_id, super_category_id)',
        ]);

        // creates index for column `discount_id`
        $this->createIndex(
            '{{%idx-discount_super_category-discount_id}}',
            '{{%discount_super_category}}',
            'discount_id'
        );

        // add foreign key for table `{{%discount}}`
        $this->addForeignKey(
            '{{%fk-discount_super_category-discount_id}}',
            '{{%discount_super_category}}',
            'discount_id',
            '{{%discount}}',
            'id',
            'CASCADE'
        );

        // creates index for column `super_category_id`
        $this->createIndex(
            '{{%idx-discount_super_category-super_category_id}}',
            '{{%discount_super_category}}',
            'super_category_id'
        );

        // add foreign key for table `{{%super_category}}`
        $this->addForeignKey(
            '{{%fk-discount_super_category-super_category_id}}',
            '{{%discount_super_category}}',
            'super_category_id',
            '{{%super_category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%discount}}`
        $this->dropForeignKey(
            '{{%fk-discount_super_category-discount_id}}',
            '{{%discount_super_category}}'
        );

        // drops index for column `discount_id`
        $this->dropIndex(
            '{{%idx-discount_super_category-discount_id}}',
            '{{%discount_super_category}}'
        );

        // drops foreign key for table `{{%super_category}}`
        $this->dropForeignKey(
            '{{%fk-discount_super_category-super_category_id}}',
            '{{%discount_super_category}}'
        );

        // drops index for column `super_category_id`
        $this->dropIndex(
            '{{%idx-discount_super_category-super_category_id}}',
            '{{%discount_super_category}}'
        );

        $this->dropTable('{{%discount_super_category}}');
    }
}
