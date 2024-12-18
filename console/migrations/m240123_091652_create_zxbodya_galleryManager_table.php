<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%zxbodya_galleryManager}}`.
 */
class m240123_091652_create_zxbodya_galleryManager_table extends Migration
{
    public $tableName = '{{%gallery_image}}';


    public function up()
    {

        $this->createTable(
            $this->tableName,
            array(
                'id' => Schema::TYPE_PK,
                'type' => Schema::TYPE_STRING,
                'ownerId' => Schema::TYPE_STRING . ' NOT NULL',
                'rank' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'name' => Schema::TYPE_STRING,
                'description' => Schema::TYPE_TEXT
            )
        );
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
