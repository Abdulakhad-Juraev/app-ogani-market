<?php

use yii\db\Migration;

/**
 * Class m250102_110617_update_date_column_blog_table
 */
class m250102_110617_update_date_column_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('blog', 'date', $this->bigInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('blog', 'date', $this->date());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250102_110617_update_date_column_blog_table cannot be reverted.\n";

        return false;
    }
    */
}
