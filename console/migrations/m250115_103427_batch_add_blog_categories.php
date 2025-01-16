<?php

use yii\db\Migration;

/**
 * Class m250115_103427_batch_add_blog_categories
 */
class m250115_103427_batch_add_blog_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsertBlogCategoryLang();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250115_103427_batch_add_blog_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250115_103427_batch_add_blog_categories cannot be reverted.\n";

        return false;
    }
    */

    /**
     * Method to insert blog categories and their translations
     */
    private function batchInsertBlogCategoryLang()
    {
        // Define categories and their translations
        $categories = [
            [
                'translations' => [
                    'uz' => 'Texnologiya',
                    'en' => 'Technology',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Fan',
                    'en' => 'Science',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Sanʼat',
                    'en' => 'Art',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Biznes',
                    'en' => 'Business',
                ],
            ],
            [
                'translations' => [
                    'uz' => 'Salomatlik',
                    'en' => 'Health',
                ],
            ],
        ];

        // Begin a transaction to ensure the integrity of inserts
        $transaction = $this->getDb()->beginTransaction();

        try {
            // Insert into the blog_category table and get the last inserted ID
            foreach ($categories as $categoryData) {
                // Insert into the `blog_category` table
                $this->insert('{{%blog_category}}', []);

                // Get the last inserted category ID
                $categoryId = $this->db->getLastInsertID('{{%blog_category}}');

                // Insert translations into the `blog_category_lang` table
                foreach ($categoryData['translations'] as $language => $translatedName) {
                    $this->insert('{{%blog_category_lang}}', [
                        'owner_id' => $categoryId,
                        'language' => $language,
                        'name' => $translatedName,
                    ]);
                }
            }

            // Commit the transaction if successful
            $transaction->commit();
            echo "Categories and translations inserted successfully.";
        } catch (\Exception $e) {
            // Rollback if an error occurs
            $transaction->rollBack();
            echo "Error occurred: " . $e->getMessage();
        }
    }
}
