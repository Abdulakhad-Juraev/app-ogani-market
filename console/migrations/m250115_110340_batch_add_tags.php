<?php

use yii\db\Migration;

/**
 * Class m250115_110340_batch_add_tags
 */
class m250115_110340_batch_add_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsertTagsLang();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250115_110340_batch_add_tags cannot be reverted.\n";

        return false;
    }

    private function batchInsertTagsLang()
    {
        // Define categories and their translations
        $tags = [

            [
                'translations' => [
                    'uz' => 'Anor',
                    'en' => 'Pomegranate',
                ],
            ],

            [
                'translations' => [
                    'uz' => 'Mevali salat',
                    'en' => 'Fruit Salad',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Vitaminlar',
                    'en' => 'Vitamins',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Yosh mevalar',
                    'en' => 'Fresh Fruits',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Organik mahsulotlar',
                    'en' => 'Organic Products',
                ],
            ],
        ];
        // Begin a transaction to ensure the integrity of inserts
        $transaction = $this->getDb()->beginTransaction();

        try {
            foreach ($tags as $categoryData) {
                $this->insert('{{%tags}}', []);

                $categoryId = $this->db->getLastInsertID('{{%tags}}');

                foreach ($categoryData['translations'] as $language => $translatedName) {
                    $this->insert('{{%tags_lang}}', [
                        'owner_id' => $categoryId,
                        'language' => $language,
                        'name' => $translatedName,
                    ]);
                }
            }

            // Commit the transaction if successful
            $transaction->commit();
            echo "Tags and translations inserted successfully.";
        } catch (\Exception $e) {
            // Rollback if an error occurs
            $transaction->rollBack();
            echo "Error occurred: " . $e->getMessage();
        }
    }
}
