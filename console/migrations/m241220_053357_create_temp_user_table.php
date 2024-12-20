<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%temp_user}}`.
 */
class m241220_053357_create_temp_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%temp_user}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
            'code' => $this->integer(),
            'expire_at' => $this->integer(),
            'is_verified' => $this->boolean()->defaultValue(false),
            'is_registered' => $this->boolean()->defaultValue(false),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%temp_user}}');
    }
}
