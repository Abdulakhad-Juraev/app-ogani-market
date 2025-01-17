<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_gallery}}`.
 */
class m250116_062418_create_product_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_gallery}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'image' => $this->string(),
            'file_name'=>$this->string(),
            'file_path' =>$this->string(),
        ]);

        $this->addForeignKey(
            'fk_product_gallery_product_id',
            '{{%product_gallery}}', 'product_id',
            '{{%product}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_gallery_product_id', 'product_gallery');
        $this->dropTable('{{%product_gallery}}');
    }
}
