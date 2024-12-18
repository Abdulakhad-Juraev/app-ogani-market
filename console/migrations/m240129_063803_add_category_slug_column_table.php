<?php

use yii\db\Migration;

/**
 * Class m240129_063803_add_category_slug_column_table
 */
class m240129_063803_add_category_slug_column_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}','slug',$this->string());
        $this->dropColumn('{{%category_lang}}','slug');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%category_lang}}','slug',$this->string());
        $this->dropColumn('{{%category}}','slug',$this->string());
    }

}
