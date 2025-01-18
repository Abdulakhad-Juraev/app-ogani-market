<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m250117_064128_add_temp_user_to_user_table
 */
class m250109_064128_add_temp_user_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $user = new User([
            'username' => 'admin',
            'email' => 'testadmin@gmail.com',
        ]);

        $user->setPassword('admin');
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;

        if (!$user->save()) {
            echo "Failed to save temp user.\n";
            return false;
        }

        echo "Temp user saved successfully.\n";
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $user = User::findOne(['username' => 'admin']);
        if ($user !== null) {
            if ($user->delete()) {
                echo "Temp user deleted successfully.\n";
                return true;
            }
        }

        echo "Temp user not found.\n";
        return false;
    }
}
