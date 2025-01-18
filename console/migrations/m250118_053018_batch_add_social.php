<?php

use yii\db\Migration;

/**
 * Class m250118_053018_batch_add_social
 */
class m250118_053018_batch_add_social extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            '{{%social}}',
            ['url', 'image', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'],
            [
                ['https://facebook.com/example', '/uploads/social/1/facebook.png', 1, time(), 1, time(), 1],
                ['https://twitter.com/example', '/uploads/social/2/telegram.png', 1, time(), 1, time(), 1],
                ['https://instagram.com/example', '/uploads/social/3/instagram.png', 1, time(), 1, time(), 1],
                ['https://linkedin.com/example', '/uploads/social/4/twitter.png', 1, time(), 1, time(), 1],
                // Add more rows as needed
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250118_053018_batch_add_social cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250118_053018_batch_add_social cannot be reverted.\n";

        return false;
    }
    */
}
