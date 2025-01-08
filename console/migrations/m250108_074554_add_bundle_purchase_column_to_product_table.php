<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m250108_074554_add_bundle_purchase_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'bundle_category_id', $this->integer());

        $this->addForeignKey('fk_bundle_category_id_super_category_id',
            'product', 'bundle_category_id',
            'super_category', 'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_bundle_category_id_super_category_id', 'product');
        $this->dropColumn('{{%product}}', 'bundle_category_id');
    }
}
