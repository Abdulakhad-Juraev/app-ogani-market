<?php

use yii\db\Migration;

/**
 * Class m250118_112436_batch_add_translation_to_message
 */
class m250118_112436_batch_add_translation_to_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $messages = [
            'menu_aksiya' => [
                'en' => 'Free Shipping for all Order of $99',
                'ru' => 'Бесплатная доставка для всех заказов на сумму $99',
                'uz' => '$99 dollarlik barcha buyurtmalar uchun bepul yetkazib berish',
            ],
            'from_the_blog' => [
                'en' => 'Blog',
                'ru' => 'Блог',
                'uz' => 'Blog',
            ],
            'top_rated_products' => [
                'en' => 'Top Rated Products',
                'ru' => 'Продукты с самым высоким рейтингом',
                'uz' => 'Eng yuqori baholangan mahsulotlar',
            ],
            'review_products' => [
                'en' => 'Review Products',
                'ru' => 'Просматриваемые товары',
                'uz' => 'Ko\'p ko\'rilgan mahsulotlar',
            ],
            'latest_products' => [
                'en' => 'Latest Products',
                'ru' => 'Последние продукты',
                'uz' => 'Eng so\'nggi mahsulotlar',
            ],
            'featured_product' => [
                'en' => 'Featured Product',
                'ru' => 'Рекомендуемый продукт',
                'uz' => 'Tavsiya etilgan mahsulotlar',
            ],
            'support_time' => [
                'en' => 'support 24/7 time',
                'ru' => 'поддержка 24/7',
                'uz' => '24/7 vaqt qo\'llab-quvvatlash',
            ],
            'search' => [
                'en' => 'Search',
                'ru' => 'Поиск',
                'uz' => 'Qidirish',
            ],
            'home_search_placeholder' => [
                'en' => 'What do you need ?',
                'ru' => 'Что вам нужно ?',
                'uz' => 'Sizga nima kerak ?',
            ],
            'all_category' => [
                'en' => 'All Categories',
                'ru' => 'Все категории',
                'uz' => 'Barcha kategoriyalar',
            ],
            'form_email' => [
                'en' => 'Email',
                'ru' => 'Электронная почта',
                'uz' => 'Elektron pochta',
            ],
            'form_name' => [
                'en' => 'Name',
                'ru' => 'Имя',
                'uz' => 'Ism',
            ],
            'send_message' => [
                'en' => 'SEND MESSAGE',
                'ru' => 'ОТПРАВИТЬ СООБЩЕНИЕ',
                'uz' => 'XABAR YUBORISH',
            ],
            'leave_message' => [
                'en' => 'Leave Message',
                'ru' => 'Оставить сообщение',
                'uz' => 'Xabar qoldiring',
            ],
            'pochta_manzili' => [
                'en' => 'hello@test.com',
                'ru' => 'hello@test.com',
                'uz' => 'hello@test.com',
            ],
            'ish_vaqti_manzili' => [
                'en' => '10:00 am to 23:00 pm',
                'ru' => '10:00 до 23:00',
                'uz' => '10:00 dan to 23:00 gacha',
            ],
            'address_manzil' => [
                'en' => '60-49 Road 11378 New York',
                'ru' => '60-49 улица 11378 Ню Ёрк',
                'uz' => '60-49 улица 11378 Nyu York',
            ],
            'tel_raqam' => [
                'en' => '+998 12 345 67 89',
                'ru' => '+998 12 345 67 89',
                'uz' => '+998 12 345 67 89',
            ],
            'work_time' => [
                'en' => 'Open time',
                'ru' => 'Время открытия',
                'uz' => 'Ish vaqti',
            ],
            'email' => [
                'en' => 'Email',
                'ru' => 'Электронная почта',
                'uz' => 'Elektron pochta',
            ],
            'address' => [
                'en' => 'Address',
                'ru' => 'Адрес',
                'uz' => 'Manzil',
            ],
            'phone' => [
                'en' => 'Phone',
                'ru' => 'Телефон',
                'uz' => 'Telefon',
            ],
            'contact' => [
                'en' => 'Contact Us',
                'ru' => 'Связаться с нами',
                'uz' => 'Kontakt',
            ],
            'home' => [
                'en' => 'Home',
                'ru' => 'Главная',
                'uz' => 'Bosh sahifa',
            ],
            'all' => [
                'en' => 'All',
                'ru' => 'Все',
                'uz' => 'Barchasi',
            ],
            'Recent News' => [
                'en' => 'Recent News',
                'ru' => 'Последние новости',
                'uz' => 'So\'nggi yangiliklar',
            ],
            'Search By' => [
                'en' => 'Search By',
                'ru' => 'Поиск по',
                'uz' => 'Izlash',
            ],
            'Categories' => [
                'en' => 'Categories',
                'ru' => 'Категории',
                'uz' => 'Kategoriyalar',
            ],
            'Read more' => [
                'en' => 'Read more',
                'ru' => 'Читать далее',
                'uz' => 'Ko\'proq o\'qish',
            ],
            'Price' => [
                'en' => 'Price',
                'ru' => 'Цена',
                'uz' => 'Narxi',
            ],
            'Products found' => [
                'en' => 'Products found',
                'ru' => 'Найденные продукты',
                'uz' => 'Mahsulotlar topildi',
            ],
            'Description' => [
                'en' => 'Description',
                'ru' => 'Описание',
                'uz' => 'Tavsif',
            ],
            'Information' => [
                'en' => 'Information',
                'ru' => 'Информация',
                'uz' => 'Ma\'lumot',
            ],
            'Reviews' => [
                'en' => 'Reviews',
                'ru' => 'Обзоры',
                'uz' => 'Sharhlar',
            ],
            'Availability' => [
                'en' => 'Availability',
                'ru' => 'Доступность',
                'uz' => 'Mavjudligi',
            ],
            'is_stock' => [
                'en' => 'In Stock',
                'ru' => 'В наличии',
                'uz' => 'Sotuvda mavjud',
            ],
            'not available' => [
                'en' => 'not available',
                'ru' => 'нет в наличии',
                'uz' => 'mavjud emas',
            ],
            'add_to_cart' => [
                'en' => 'Add to cart',
                'ru' => 'Добавить в корзину',
                'uz' => 'Savatga qo\'shish',
            ],
            'Share on' => [
                'en' => 'Share on',
                'ru' => 'Поделиться',
                'uz' => 'Ulashish',
            ],
            'Related Products' => [
                'en' => 'Related Products',
                'ru' => 'Сопутствующие товары',
                'uz' => 'Tegishli mahsulotlar',
            ],
            'Profile' => [
                'en' => 'Profile',
                'ru' => 'Профиль',
                'uz' => 'Profil',
            ],
            'contact_page' => [
                'en' => 'Contact',
                'ru' => 'Контакт',
                'uz' => 'Kontakt',
            ],
            'Discount' => [
                'en' => 'Discount',
                'ru' => 'Скидка',
                'uz' => 'Chegirma',
            ],
            'Shop' => [
                'en' => 'Shop',
                'ru' => 'Магазин',
                'uz' => 'Do\'kon',
            ],
            'Login' => [
                'en' => 'Login',
                'ru' => 'Логин',
                'uz' => 'Kirish',
            ],
            'Logout' => [
                'en' => 'Logout',
                'ru' => 'Выход',
                'uz' => 'Chiqish',
            ],
            'special_offers' => [
                'en' => 'Get E-mail updates about our latest shop and special offers.',
                'ru' => 'Получайте по электронной почте обновления о наших последних магазинах и специальных предложениях.',
                'uz' => 'Bizning so\'nggi do\'konimiz va maxsus takliflar haqida elektron pochta xabarlarini oling.',
            ],
            'Useful Links' => [
                'en' => 'Useful Links',
                'ru' => 'Полезные ссылки',
                'uz' => 'Foydali havolalar',
            ],
            'Post You May Like' => [
                'en' => 'Post You May Like',
                'ru' => 'Пост, который вам может понравиться',
                'uz' => 'Post sizga yoqishi mumkin',
            ],
            'Last viewed products' => [
                'en' => 'Last viewed products',
                'ru' => 'Последние просмотренные товары',
                'uz' => 'Oxirgi koʻrilgan mahsulotlar',
            ],
            'Orders saved' => [
                'en' => 'Orders saved',
                'ru' => 'Заказы сохранены',
                'uz' => 'Buyurtmalar saqlandi',
            ],
            'Thank You' => [
                'en' => 'Thank You',
                'ru' => 'Спасибо',
                'uz' => 'Rahmat',
            ],
            'Shopping Cart' => [
                'en' => 'Shopping Cart',
                'ru' => 'Корзина',
                'uz' => 'Xarid savati',
            ],
            'Cart Total' => [
                'en' => 'Cart Total',
                'ru' => 'Всего в корзине',
                'uz' => 'Savat jami',
            ],
            'Total' => [
                'en' => 'Total',
                'ru' => 'Общий',
                'uz' => 'Jami',
            ],
            'Purchase' => [
                'en' => 'Purchase',
                'ru' => 'Покупка',
                'uz' => 'Sotib olish',
            ],
            'User Profile' => [
                'en' => 'User Profile',
                'ru' => 'Профиль пользователя',
                'uz' => 'Foydalanuvchi profili',
            ],
            'Change personal information' => [
                'en' => 'Change personal information',
                'ru' => 'Изменить личную информацию',
                'uz' => 'Shaxsiy ma\'lumotlarni o\'zgartirish',
            ],
            'Change password' => [
                'en' => 'Change password',
                'ru' => 'Изменить пароль',
                'uz' => 'Parolni o\'zgartirish',
            ],
            'Product detail' => [
                'en' => 'Product detail',
                'ru' => 'Подробности продукта',
                'uz' => 'Mahsulot tafsilotlari',
            ]
        ];

        $this->batchInsert(
            'source_message',
            ['category', 'message'],
            array_map(fn($messageText) => ['app', $messageText], array_keys($messages))
        );

        $sourceMessageIds = (new \yii\db\Query())
            ->select(['id', 'message'])
            ->from('source_message')
            ->where(['category' => 'app', 'message' => array_keys($messages)])
            ->indexBy('message')
            ->column();

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

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('message', ['language' => ['uz', 'ru', 'en']]);
        $this->delete('source_message', [
            'category' => 'app',
            'message' => [
                'menu_aksiya',
                'from_the_blog',
                'top_rated_products',
                'review_products',
                'latest_products',
                'featured_product',
                'support_time',
                'search',
                'home_search_placeholder',
                'all_category',
                'form_email',
                'form_name',
                'send_message',
                'leave_message',
                'pochta_manzili',
                'ish_vaqti_manzili',
                'address_manzil',
                'tel_raqam',
                'work_time',
                'email',
                'address',
                'phone',
                'contact',
                'home',
                'all',
                'Recent News',
                'Search By',
                'Categories',
                'Read more',
                'Price',
                'Products found',
                'Description',
                'Information',
                'Reviews',
                'Availability',
                'is_stock',
                'not available',
                'add_to_cart',
                'Share on',
                'Related Products',
                'Profile',
                'contact_page',
                'Discount',
                'Shop',
                'Login',
                'Logout',
                'special_offers',
                'Useful Links',
                'Post You May Like',
                'Last viewed products',
                'Orders saved',
                'Thank You',
                'Shopping Cart',
                'Cart Total',
                'Total',
                'Purchase',
                'User Profile',
                'Change personal information',
                'Change password',
            ],
        ]);
    }


}
