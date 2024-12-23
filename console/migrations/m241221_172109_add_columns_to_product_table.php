<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product}}`.
 */
class m241221_172109_add_columns_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'status', $this->tinyInteger());
        $this->addColumn('product', 'discount_price', $this->float());
        $this->addColumn('product', 'created_at', $this->bigInteger());
        $this->addColumn('product', 'updated_at', $this->bigInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'updated_at');
        $this->dropColumn('product', 'created_at');
        $this->dropColumn('product', 'discount_price');
        $this->dropColumn('product', 'status');
    }
}
