<?php

use yii\db\Migration;

/**
 * Class m240124_060323_remove_slug_column_product_lang_table
 */
class m240124_060323_remove_slug_column_product_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%product_lang}}', 'slug');
        $this->addColumn('{{%product}}', 'slug', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'slug');
        $this->addColumn('{{%product_lang}}', 'slug', $this->string());
    }

}
