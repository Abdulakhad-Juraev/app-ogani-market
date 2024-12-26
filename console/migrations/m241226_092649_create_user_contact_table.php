<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_contact}}`.
 */
class m241226_092649_create_user_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_contact}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(),
            'lastname' => $this->string(),
            'phone' => $this->string(),
            'address' => $this->string(),
            'user_id' => $this->integer(),


            'created_at' => $this->bigInteger()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_user_contact_user_id',
            '{{%user_contact}}', 'user_id',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_contact_created_by',
            '{{%user_contact}}', 'created_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_contact_updated_by',
            '{{%user_contact}}', 'updated_by',
            '{{%user}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_contact_updated_by', 'user_contact');
        $this->dropForeignKey('fk_user_contact_created_by', 'user_contact');
        $this->dropForeignKey('fk_user_contact_user_id', 'user_contact');
        $this->dropTable('{{%user_contact}}');
    }
}
