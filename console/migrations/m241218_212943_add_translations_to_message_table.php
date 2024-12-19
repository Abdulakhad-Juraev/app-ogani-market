<?php

use yii\db\Migration;

/**
 * Class m241218_212943_add_translations_to_message_table
 */
class m241218_212943_add_translations_to_message_table extends Migration
{
    public function safeUp()
    {
        // source_message uchun ma'lumotlar
        $messages = [
            'Hello' => [
                'uz' => 'Salom',
                'en' => 'Hello',
            ],
            'Goodbye' => [
                'uz' => 'Xayr',
                'en' => 'Goodbye',
            ],
            'An error occurred' => [
                'uz' => 'Xatolik yuz berdi',
                'en' => 'An error occurred',
            ],
        ];

        // source_message jadvaliga batchInsert orqali qo'shish
        $this->batchInsert(
            'source_message',
            ['category', 'message'],
            array_map(fn($messageText) => ['app', $messageText], array_keys($messages))
        );

        // Qo'shilgan source_message idlarini olish
        $sourceMessageIds = (new \yii\db\Query())
            ->select(['id', 'message'])
            ->from('source_message')
            ->where(['category' => 'app', 'message' => array_keys($messages)])
            ->indexBy('message')
            ->column();

        // message jadvaliga tarjimalarni qo'shish
        $insertData = [];
        foreach ($messages as $messageText => $translations) {
            foreach ($translations as $language => $translation) {
                $insertData[] = [
                    $sourceMessageIds[$messageText], // source_message_id
                    $language,                      // language
                    $translation                    // translation
                ];
            }
        }

        $this->batchInsert('message', ['id', 'language', 'translation'], $insertData);
    }

    public function safeDown()
    {
        // message va source_message jadvalidan ma'lumotlarni o'chirish
        $this->delete('message', ['language' => ['uz', 'ru', 'en']]);
        $this->delete('source_message', [
            'category' => 'app',
            'message' => ['Hello', 'Goodbye', 'An error occurred'],
        ]);
    }

}
