<?php

namespace console\controllers;

namespace console\controllers;

use backend\models\Social;
use common\models\User;
use common\modules\blog\models\BlogCategory;
use Faker\Factory;
use Yii;
use yii\console\Controller;
use yii\db\Exception;
use yii\db\Query;

class SeederController extends Controller
{
    /**
     * @throws Exception
     */
    public function actionGenerate($count = 4)
    {
        $faker = Factory::create();

        // Foydalanuvchi ID olish
        $userId = (new Query())->select(['id'])->from('user')->limit(1)->scalar();
        if (!$userId) {
            echo "No users found in the database.\n";
            return;
        }

        // Konsol foydalanuvchisini sozlash
        $user = User::findOne($userId);
        Yii::$app->user->setIdentity($user);

        $imageFiles = [
            Yii::getAlias('@console/data/social/facebook.png'),
            Yii::getAlias('@console/data/social/instagram.png'),
            Yii::getAlias('@console/data/social/telegram.png'),
            Yii::getAlias('@console/data/social/twitter.png'),
        ];

        for ($i = 0; $i < $count; $i++) {
            $social = new Social();
            $social->url = '#';
            $social->status = Social::STATUS_TRUE;

            $social->created_at = time();
            $social->updated_at = time();
            $social->created_by = $userId;
            $social->updated_by = $userId;

            if (!$social->save()) {
                echo "Error saving Social record.\n";
                print_r($social->errors);
                continue;
            }

            $socialFolder = Yii::getAlias('@frontend/web/uploads/social/' . $social->id);
            if (!is_dir($socialFolder)) {
                mkdir($socialFolder, 0777, true);
            }

            $randomImage = $imageFiles[array_rand($imageFiles)];
            $destinationPath = $socialFolder . '/fake.jpg';

            if (copy($randomImage, $destinationPath)) {
                $social->image = '/uploads/social/' . $social->id . '/fake.jpg';
            } else {
                echo "Error copying image for Social record with ID: {$social->id}\n";
            }

            if (!$social->save()) {
                echo "Error saving image for Social record with ID: {$social->id}\n";
                print_r($social->errors);
            } else {
                echo "Social record saved with image: {$social->id}\n";
            }
        }
        echo "Fake data generated successfully.\n";
    }
}
