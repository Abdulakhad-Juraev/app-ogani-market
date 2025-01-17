<?php

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
            ['imageFiles' => [
                '/uploads/product/1/image1.jpg',
                '/uploads/product/1/image2.jpg',
                '/uploads/product/1/image3.jpg',
            ],
                'price' => 200,
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 10,
                'slug' => 'product-1',
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 1', 'description' => 'Description of Product 1' ],
                    ['language' => 'uz', 'name' => 'Product 1', 'description' => 'Descripción del Producto 1' ],
                ]
            ], 'imageFiles' => [
                '/uploads/product/2/image1.jpg',
                '/uploads/product/2/image2.jpg',
                '/uploads/product/2/image3.jpg',
            ],
            ['price' => 200,

                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'slug' => 'product-2',
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 2', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 2', 'description' => 'Descripción del Producto 2'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/3/image1.jpg',
                '/uploads/product/3/image2.jpg',
                '/uploads/product/3/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-3',
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 10,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 3', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 3', 'description' => 'Descripción del Producto 1'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/4/image1.jpg',
                '/uploads/product/4/image2.jpg',
                '/uploads/product/4/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-4',
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 4', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 4', 'description' => 'Descripción del Producto 2'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/5/image1.jpg',
                '/uploads/product/5/image2.jpg',
                '/uploads/product/5/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-5',
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 10,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 5', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 5', 'description' => 'Descripción del Producto 1'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/6/image1.jpg',
                '/uploads/product/6/image2.jpg',
                '/uploads/product/6/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-6',
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 6', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 6', 'description' => 'Descripción del Producto 2'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/7/image1.jpg',
                '/uploads/product/7/image2.jpg',
                '/uploads/product/7/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-7',
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 10,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 7', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 7', 'description' => 'Descripción del Producto 1'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/8/image1.jpg',
                '/uploads/product/8/image2.jpg',
                '/uploads/product/8/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-8',
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 8', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 8', 'description' => 'Descripción del Producto 2'],
                ]
            ],
            ['imageFiles' => [
                '/uploads/product/9/image1.jpg',
                '/uploads/product/9/image2.jpg',
                '/uploads/product/9/image3.jpg',
            ],
                'price' => 200,
                'slug' => 'product-9',
                'super_category_id' => 1,
                'is_stock' => true,
                'start_count' => 10,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 9', 'description' => 'Description of Product 1'],
                    ['language' => 'uz', 'name' => 'Product 9', 'description' => 'Descripción del Producto 1'],
                ]
            ],
                ['imageFiles' => [
                    '/uploads/product/10/image1.jpg',
                    '/uploads/product/10/image2.jpg',
                    '/uploads/product/10/image3.jpg',
                ],
                'price' => 200,
                'slug' => 'product-10',
                'super_category_id' => 2,
                'is_stock' => false,
                'start_count' => 0,
                'langs' => [
                    ['language' => 'en', 'name' => 'Product 10', 'description' => 'Description of Product 2'],
                    ['language' => 'uz', 'name' => 'Product 10', 'description' => 'Descripción del Producto 2'],
                ]
            ],
            // Add more products as needed
        ];
//        $products = [
//            [
//                'imageFiles' => [
//                    '/uploads/product/1/image1.jpg',
//                    '/uploads/product/1/image2.jpg',
//                    '/uploads/product/1/image3.jpg',
//                ],
//                'price' => 200,
//                'super_category_id' => 1,
//                'is_stock' => true,
//                'start_count' => 10,
//                'slug' => 'product-1',
//                'langs' => [
//                    ['language' => 'en', 'name' => 'Product 1', 'description' => 'Description of Product 1', 'slug' => 'product-1'],
//                    ['language' => 'uz', 'name' => 'Product 1', 'description' => 'Descripción del Producto 1', 'slug' => 'producto-1'],
//                ]
//            ],
//            // Add other products here...
//        ];

        // Insert products into product table
        $productData = [];
        foreach ($products as $product) {
            $productData[] = [
                'slug' => $product['slug'],
                'price' => $product['price'],
                'super_category_id' => $product['super_category_id'],
                'is_stock' => $product['is_stock'],
                'start_count' => $product['start_count'],
            ];
        }

        // Perform batch insert for product table
        $this->batchInsert('{{%product}}', ['slug', 'price', 'super_category_id', 'is_stock', 'start_count'], $productData);

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
                    'file_path' => '/uploads/product/' . $productId . '/' . $fileName,  // Path for file storage
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
