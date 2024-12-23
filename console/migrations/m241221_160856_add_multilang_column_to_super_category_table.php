<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%super_category}}`.
 */
class m241221_160856_add_multilang_column_to_super_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('super_category', 'image', $this->string());
        $this->addColumn('super_category', 'status', $this->tinyInteger());
        $this->addColumn('super_category', 'is_favorite', $this->boolean());
        $this->addColumn('super_category', 'slug', $this->string());
        $this->addColumn('super_category', 'created_at', $this->bigInteger());
        $this->addColumn('super_category', 'updated_at', $this->bigInteger());
        $this->dropColumn('super_category', 'name');


        $this->createTable('{{%super_category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(),
        ]);

        $this->addForeignKey('fk_super_category_lang',
            '{{%super_category_lang}}', 'owner_id',
            '{{%super_category}}', 'id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_super_category_lang', '{{%super_category_lang}}');
        $this->dropTable('{{%super_category_lang}}');
        $this->dropColumn('super_category', 'image');
        $this->dropColumn('super_category', 'status');
        $this->dropColumn('super_category', 'is_favorite');
        $this->dropColumn('super_category', 'slug');
        $this->dropColumn('super_category', 'updated_at');
        $this->dropColumn('super_category', 'created_at');
        $this->addColumn('super_category', 'name', $this->string());
    }
}
