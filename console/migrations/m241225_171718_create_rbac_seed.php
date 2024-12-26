<?php

use yii\db\Migration;

/**
 * Class m241225_171718_create_rbac_seed
 */
class m241225_171718_create_rbac_seed extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Rollarni yaratish
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);

        $manager = $auth->createRole('manager');
        $manager->description = 'Manager';
        $auth->add($manager);

        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);

        // Ruxsatlarni yaratish
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a user';
        $auth->add($createUser);

        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Update a user';
        $auth->add($updateUser);

        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = 'Delete a user';
        $auth->add($deleteUser);

        // Rollarga ruxsatlarni biriktirish
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $updateUser);
        $auth->addChild($admin, $deleteUser);

        $auth->addChild($manager, $createUser);
        $auth->addChild($manager, $updateUser);

        $auth->addChild($user, $createUser);

        // Admin rolli foydalanuvchini yaratish
        $auth->assign($admin, 1); // User ID 1 ga admin roll beriladi
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); // Rollar, ruxsatlar va assignmentlarni o'chirish
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241225_171718_create_rbac_seed cannot be reverted.\n";

        return false;
    }
    */
}
