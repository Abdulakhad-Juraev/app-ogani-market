<?php

use common\modules\blog\models\Blog;
use common\modules\blog\models\lang\BlogLang;
use yii\db\Migration;

/**
 * Class m250115_111339_batch_add_blog
 */
class m250115_111339_batch_add_blog extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        $transaction = $this->db->beginTransaction();

        try {
            // 1. Blog jadvaliga batch insert
            $blogs = [
                [
                    'date' => '1736767190',
                    'category_id' => 1,
                    'slug' => 'tech-blog',
                    'image' => '678b440a1ddf7.jpg', // Rasm nomini qo'shish
                ],
                [
                    'date' => '1736767190',
                    'category_id' => 2,
                    'slug' => 'science-blog',
                    'image' => '678b44728d196.jpg',
                ],
                [
                    'date' => '1736767190',
                    'category_id' => 3,
                    'slug' => 'tech-blog',
                    'image' => '678b4498bad3d.jpg', // Rasm nomini qo'shish
                ],
                [
                    'date' => '1736767190',
                    'category_id' => 4,
                    'slug' => 'science-blog',
                    'image' => '678b44bc94bcd.jpg',
                ],

            ];

            // Bloglar jadvaliga batch insert
            $this->batchInsert(Blog::tableName(), ['date', 'category_id', 'slug', 'image'], $blogs);

            $blogLangs = [
                [
                    'owner_id' => 1, // Blogning ID'si (yaratilgan blogning ID)
                    'language' => 'uz',
                    'title' => 'Texnologiya Blogi',
                    'short_desc' => 'Texnologiya haqida maʼlumotlar',
                    'content' => 'Texnologiya sohasidagi yangiliklar',
                ],
                [
                    'owner_id' => 1,
                    'language' => 'en',
                    'title' => 'Technology Blog',
                    'short_desc' => 'Information about technology',
                    'content' => 'News from the technology field',
                ],
                [
                    'owner_id' => 2,
                    'language' => 'uz',
                    'title' => 'Fan Blogi',
                    'short_desc' => 'Fan haqida yangiliklar',
                    'content' => 'Fan sohasidagi qiziqarli maqolalar',
                ],
                [
                    'owner_id' => 2,
                    'language' => 'en',
                    'title' => 'Science Blog',
                    'short_desc' => 'News about science',
                    'content' => 'Interesting articles from science',
                ],
                [
                    'owner_id' => 3,
                    'language' => 'uz',
                    'title' => 'Sog‘liqni saqlash Blogi',
                    'short_desc' => 'Sog‘liqni saqlash va wellness haqida',
                    'content' => 'Sog‘liqni saqlash sohasidagi yangiliklar va maslahatlar',
                ],
                [
                    'owner_id' => 3,
                    'language' => 'en',
                    'title' => 'Health Blog',
                    'short_desc' => 'Health and wellness',
                    'content' => 'News and tips on health and wellness',
                ],
                [
                    'owner_id' => 4,
                    'language' => 'uz',
                    'title' => 'Sanʼat Blogi',
                    'short_desc' => 'Sanʼat va madaniyat haqida',
                    'content' => 'Sanʼat va madaniyatning eng yangi yangiliklari',
                ],
                [
                    'owner_id' => 4,
                    'language' => 'en',
                    'title' => 'Art Blog',
                    'short_desc' => 'Art and culture',
                    'content' => 'The latest news in art and culture',
                ],

            ];

            // BlogLang jadvaliga batch insert
            $this->batchInsert(BlogLang::tableName(), ['owner_id', 'language', 'title', 'short_desc', 'content'], $blogLangs);

            // Tranzaksiyani tasdiqlash
            $transaction->commit();
        } catch (Exception $e) {
            // Agar xato bo'lsa, tranzaksiyani qaytarish
            $transaction->rollBack();
            throw $e;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250115_111339_batch_add_blog cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250115_111339_batch_add_blog cannot be reverted.\n";

        return false;
    }
    */
}
