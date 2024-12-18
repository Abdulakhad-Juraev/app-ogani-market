<?php

use yii\db\Migration;

/**
 * Class m240124_111450_add_price_column_product_table
 */
class m240124_111450_add_price_column_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}','price',$this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}','price');
    }
}
