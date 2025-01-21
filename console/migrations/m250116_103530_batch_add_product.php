<?php

use common\modules\product\models\Product;
use yii\db\Migration;

/**
 * Class m250116_103530_batch_add_product
 */
class m250116_103530_batch_add_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $products = [
            [
                'slug' => 'product-1',
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 5,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 1', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 1', 'description' => 'Descripción del Producto 1'],
                ],
                'imageFiles' => [
                    'uploads/product/1/image1.jpg',
                    'uploads/product/1/image2.jpg',
                    'uploads/product/1/image3.jpg',
                ]
            ],
            [
                'slug' => 'product-2',
                'price' => 200,
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 5,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 2', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 2', 'description' => 'Descripción del Producto 2'],
                ], 'imageFiles' => [
                'uploads/product/2/image1.jpg',
                'uploads/product/2/image2.jpg',
                'uploads/product/2/image3.jpg',
            ],
            ],
            [
                'slug' => 'product-3',
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 4,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 3', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 3', 'description' => 'Descripción del Producto 1'],
                ],
                'imageFiles' => [
                    'uploads/product/3/image1.jpg',
                    'uploads/product/3/image2.jpg',
                    'uploads/product/3/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-4',
                'price' => 200,
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 5,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 4', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 4', 'description' => 'Descripción del Producto 2'],
                ],
                'imageFiles' => [
                    'uploads/product/4/image1.jpg',
                    'uploads/product/4/image2.jpg',
                    'uploads/product/4/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-5',
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 5,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 5', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 5', 'description' => 'Descripción del Producto 1'],
                ],
                'imageFiles' => [
                    'uploads/product/5/image1.jpg',
                    'uploads/product/5/image2.jpg',
                    'uploads/product/5/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-6',
                'price' => 200,
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 2,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 6', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 6', 'description' => 'Descripción del Producto 2'],
                ],
                'imageFiles' => [
                    'uploads/product/6/image1.jpg',
                    'uploads/product/6/image2.jpg',
                    'uploads/product/6/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-7',
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 3,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 7', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 7', 'description' => 'Descripción del Producto 1'],
                ],
                'imageFiles' => [
                    'uploads/product/7/image1.jpg',
                    'uploads/product/7/image2.jpg',
                    'uploads/product/7/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-8',
                'price' => 200,
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 2,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 8', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 8', 'description' => 'Descripción del Producto 2'],
                ],
                'imageFiles' => [
                    'uploads/product/8/image1.jpg',
                    'uploads/product/8/image2.jpg',
                    'uploads/product/8/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-9',
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 5,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 9', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 9', 'description' => 'Descripción del Producto 1'],
                ],
                'imageFiles' => [
                    'uploads/product/9/image1.jpg',
                    'uploads/product/9/image2.jpg',
                    'uploads/product/9/image3.jpg',
                ]
            ],
            [
                'slug' => 'product-10',
                'price' => 200,
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 10', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 10', 'description' => 'Descripción del Producto 2'],
                ],
                'imageFiles' => [
                    'uploads/product/10/image1.jpg',
                    'uploads/product/10/image2.jpg',
                    'uploads/product/10/image3.jpg',
                ],
            ],
            [
                'slug' => 'product-11',
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 11', 'description' => 'Description of Product 11'],
                    ['language' => 'uz', 'name' => 'Product 11', 'description' => 'Descripción del Producto 11'],
                ],
                'imageFiles' => [
                    'uploads/product/11/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-12',
                'price' => 200,
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 12', 'description' => 'Description of Product 12'],
                    ['language' => 'uz', 'name' => 'Product 12', 'description' => 'Descripción del Producto 12'],
                ],
                'imageFiles' => [
                    'uploads/product/12/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-13',
                'price' => 210,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 13', 'description' => 'Description of Product 13'],
                    ['language' => 'uz', 'name' => 'Product 13', 'description' => 'Descripción del Producto 13'],
                ],
                'imageFiles' => [
                    'uploads/product/13/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-14',
                'price' => 220,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 14', 'description' => 'Description of Product 14'],
                    ['language' => 'uz', 'name' => 'Product 14', 'description' => 'Descripción del Producto 14'],
                ],
                'imageFiles' => [
                    'uploads/product/14/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-15',
                'price' => 230,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 15', 'description' => 'Description of Product 15'],
                    ['language' => 'uz', 'name' => 'Product 15', 'description' => 'Descripción del Producto 15'],
                ],
                'imageFiles' => [
                    'uploads/product/15/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-16',
                'price' => 240,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 16', 'description' => 'Description of Product 16'],
                    ['language' => 'uz', 'name' => 'Product 16', 'description' => 'Descripción del Producto 16'],
                ],
                'imageFiles' => [
                    'uploads/product/16/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-17',
                'price' => 250,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 17', 'description' => 'Description of Product 17'],
                    ['language' => 'uz', 'name' => 'Product 17', 'description' => 'Descripción del Producto 17'],
                ],
                'imageFiles' => [
                    'uploads/product/17/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-18',
                'price' => 260,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 18', 'description' => 'Description of Product 18'],
                    ['language' => 'uz', 'name' => 'Product 18', 'description' => 'Descripción del Producto 18'],
                ],
                'imageFiles' => [
                    'uploads/product/18/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-19',
                'price' => 270,
                'super_category_id' => 5,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 19', 'description' => 'Description of Product 19'],
                    ['language' => 'uz', 'name' => 'Product 19', 'description' => 'Descripción del Producto 19'],
                ],
                'imageFiles' => [
                    'uploads/product/19/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-20',
                'price' => 280,
                'super_category_id' => 4,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 20', 'description' => 'Description of Product 20'],
                    ['language' => 'uz', 'name' => 'Product 20', 'description' => 'Descripción del Producto 20'],
                ],
                'imageFiles' => [
                    'uploads/product/20/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-21',
                'price' => 290,
                'super_category_id' => 4,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 21', 'description' => 'Description of Product 21'],
                    ['language' => 'uz', 'name' => 'Product 21', 'description' => 'Descripción del Producto 21'],
                ],
                'imageFiles' => [
                    'uploads/product/21/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-22',
                'price' => 300,
                'super_category_id' => 4,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 22', 'description' => 'Description of Product 22'],
                    ['language' => 'uz', 'name' => 'Product 22', 'description' => 'Descripción del Producto 22'],
                ],
                'imageFiles' => [
                    'uploads/product/22/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-23',
                'price' => 310,
                'super_category_id' => 4,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 23', 'description' => 'Description of Product 23'],
                    ['language' => 'uz', 'name' => 'Product 23', 'description' => 'Descripción del Producto 23'],
                ],
                'imageFiles' => [
                    'uploads/product/23/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-24',
                'price' => 320,
                'super_category_id' => 4,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 24', 'description' => 'Description of Product 24'],
                    ['language' => 'uz', 'name' => 'Product 24', 'description' => 'Descripción del Producto 24'],
                ],
                'imageFiles' => [
                    'uploads/product/24/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-25',
                'price' => 330,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 25', 'description' => 'Description of Product 25'],
                    ['language' => 'uz', 'name' => 'Product 25', 'description' => 'Descripción del Producto 25'],
                ],
                'imageFiles' => [
                    'uploads/product/25/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-26',
                'price' => 340,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 26', 'description' => 'Description of Product 26'],
                    ['language' => 'uz', 'name' => 'Product 26', 'description' => 'Descripción del Producto 26'],
                ],
                'imageFiles' => [
                    'uploads/product/26/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-27',
                'price' => 350,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 27', 'description' => 'Description of Product 27'],
                    ['language' => 'uz', 'name' => 'Product 27', 'description' => 'Descripción del Producto 27'],
                ],
                'imageFiles' => [
                    'uploads/product/27/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-28',
                'price' => 360,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 28', 'description' => 'Description of Product 28'],
                    ['language' => 'uz', 'name' => 'Product 28', 'description' => 'Descripción del Producto 28'],
                ],
                'imageFiles' => [
                    'uploads/product/28/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-29',
                'price' => 370,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 29', 'description' => 'Description of Product 29'],
                    ['language' => 'uz', 'name' => 'Product 29', 'description' => 'Descripción del Producto 29'],
                ],
                'imageFiles' => [
                    'uploads/product/29/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-30',
                'price' => 380,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 30', 'description' => 'Description of Product 30'],
                    ['language' => 'uz', 'name' => 'Product 30', 'description' => 'Descripción del Producto 30'],
                ],
                'imageFiles' => [
                    'uploads/product/30/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-31',
                'price' => 390,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 31', 'description' => 'Description of Product 31'],
                    ['language' => 'uz', 'name' => 'Product 31', 'description' => 'Descripción del Producto 31'],
                ],
                'imageFiles' => [
                    'uploads/product/31/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-32',
                'price' => 400,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 32', 'description' => 'Description of Product 32'],
                    ['language' => 'uz', 'name' => 'Product 32', 'description' => 'Descripción del Producto 32'],
                ],
                'imageFiles' => [
                    'uploads/product/32/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-33',
                'price' => 410,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 33', 'description' => 'Description of Product 33'],
                    ['language' => 'uz', 'name' => 'Product 33', 'description' => 'Descripción del Producto 33'],
                ],
                'imageFiles' => [
                    'uploads/product/33/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-34',
                'price' => 420,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 34', 'description' => 'Description of Product 34'],
                    ['language' => 'uz', 'name' => 'Product 34', 'description' => 'Descripción del Producto 34'],
                ],
                'imageFiles' => [
                    'uploads/product/34/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-35',
                'price' => 430,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 35', 'description' => 'Description of Product 35'],
                    ['language' => 'uz', 'name' => 'Product 35', 'description' => 'Descripción del Producto 35'],
                ],
                'imageFiles' => [
                    'uploads/product/35/image1.jpg',
                ],
            ],
            [
                'slug' => 'product-36',
                'price' => 440,
                'super_category_id' => 3,
                'is_stock' => false,
                'start_count' => 0,
                'status' => Product::STATUS_TRUE,
                'created_at' => time(),
                'updated_at' => time(),
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 36', 'description' => 'Description of Product 36'],
                    ['language' => 'uz', 'name' => 'Product 36', 'description' => 'Descripción del Producto 36'],
                ],
                'imageFiles' => [
                    'uploads/product/36/image1.jpg',
                ],
            ],


        ];

        // Insert products into product table
        $productData = [];
        foreach ($products as $product) {
            $productData[] = [
                'slug' => $product['slug'],
                'price' => $product['price'],
                'super_category_id' => $product['super_category_id'],
                'is_stock' => $product['is_stock'],
                'start_count' => $product['start_count'],
                'status' => $product['status'],
                'created_at' => $product['created_at'],
                'updated_at' => $product['updated_at'],
            ];
        }

        // Perform batch insert for product table
        $this->batchInsert('{{%product}}', ['slug', 'price', 'super_category_id', 'is_stock', 'start_count','status','created_at','updated_at'], $productData);

        // Insert languages for each product into product_lang table
        $productIds = $this->db->createCommand('SELECT id FROM {{%product}}')->queryColumn();
        foreach ($products as $index => $product) {
            $productId = $productIds[$index]; // Get the corresponding product ID
            $langData = [];
            foreach ($product['langs'] as $lang) {
                $langData[] = [
                    'owner_id' => $productId,
                    'language' => $lang['language'],
                    'name' => $lang['name'],
                    'description' => $lang['description'],
                ];
            }
            // Perform batch insert for product_lang table
            $this->batchInsert('{{%product_lang}}', ['owner_id', 'language', 'name', 'description'], $langData);

            // Insert images into the product_gallery table
            $galleryData = [];
            foreach ($product['imageFiles'] as $imagePath) {
                $fileName = basename($imagePath);  // Extract file name from the path
                $galleryData[] = [
                    'product_id' => $productId,
                    'image' => $imagePath,  // Full image path to store in 'image' field
                    'file_name' => $fileName,  // Store file name separately
                    'file_path' => 'uploads/product/' . $productId . '/' . $fileName,  // Path for file storage
                ];
            }

            // Perform batch insert for product_gallery table
            $this->batchInsert('{{%product_gallery}}', ['product_id', 'image', 'file_name', 'file_path'], $galleryData);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250116_103530_batch_add_product cannot be reverted.\n";

        return false;
    }
}
