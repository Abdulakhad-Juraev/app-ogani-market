<?php

namespace console\controllers;

use backend\models\Social;
use common\models\User;
use Faker\Factory;
use Yii;
use yii\console\Controller;
use yii\db\Query;

class SeederController extends Controller
{
    public function actionGenerate($count = 10)
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

        for ($i = 0; $i < $count; $i++) {
            $social = new Social();
            $social->url = $faker->url;
            $social->status = 1;

            // Modelni saqlashdan oldin rasmni yaratib bo'lish kerak
            $social->created_at = time();
            $social->updated_at = time();
            $social->created_by = $userId;
            $social->updated_by = $userId;

            if (!$social->save()) {
                echo "Error saving Social record.\n";
                print_r($social->errors);
                continue;  // Keyingi yozuvga o'tish
            }

            // Social ID bilan papka yaratish
            $socialFolder = Yii::getAlias('@frontend/web/uploads/social/' . $social->id);
            if (!is_dir($socialFolder)) {
                mkdir($socialFolder, 0777, true);
            }

            // Faker yordamida rasm yaratish
            $imagePath = $socialFolder . '/image.jpg';  // Har bir model uchun rasm
            $faker->image($imagePath, 960, 640);  // Rasm o‘lchamlari

            // Rasmni modelga qo'shish
            $social->image = '/uploads/social/' . $social->id . '/image.jpg';

            // Rasmni saqlash
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
