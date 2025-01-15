<?php

use yii\db\Migration;

/**
 * Class m250115_120822_batch_add_blog_tags
 */
class m250115_120822_batch_add_blog_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%blog_tags}}', ['blog_id', 'tags_id'], [
            [1, 1],
            [1, 2],
            [2, 1],
            [2, 3],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250115_120822_batch_add_blog_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250115_120822_batch_add_blog_tags cannot be reverted.\n";

        return false;
    }
    */
}
