<?php

use yii\db\Migration;

/**
 * Class m240125_063442_add_img_column_blog_table
 */
class m240125_063442_add_img_column_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%blog}}', 'image', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%blog}}', 'image');
    }
}
