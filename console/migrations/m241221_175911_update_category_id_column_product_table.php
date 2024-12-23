<?php

use yii\db\Migration;

/**
 * Class m241221_175911_update_category_id_column_product_table
 */
class m241221_175911_update_category_id_column_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_category_with_product', '{{%product}}');
        $this->dropColumn('product', 'category_id');
        $this->addColumn('product', 'super_category_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'super_category_id');
        $this->addColumn('product', 'category_id', $this->integer());
        $this->addForeignKey('fk_category_with_product',
            '{{%product}}', 'category_id',
            '{{%category}}', 'id',
            'CASCADE', 'CASCADE');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241221_175911_update_category_id_column_product_table cannot be reverted.\n";

        return false;
    }
    */
}
