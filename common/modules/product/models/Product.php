<?php

namespace common\modules\product\models;

use backend\models\Category;
use backend\models\GalleryImage;
use common\components\CyrillicSlugBehavior;

//use common\modules\article\models\UserBooks;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Exception;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $super_category_id
 * @property int|null $bundle_category_id
 * @property int|null $is_stock
 * @property int|null $start_count
 * @property int|null $price
 * @property int|null $discount_price
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $image
 *
 * @property Category $category
 */
class Product extends ActiveRecord
{
    /**
     * @var
     */
    public $is_liked;
    public $imageFiles;
    public const STOCK_TRUE = 1;
    public const STATUS_TRUE = 1;
    public const STOCK_FALSE = 0;
    /**
     * @var mixed|null
     */

    use MultilingualLabelsTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['super_category_id', 'bundle_category_id', 'is_stock', 'start_count', 'price', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'characteristics', 'description', 'info', 'reviews', 'slug', 'discount_price'], 'string'],
//            [['image'], 'file'],
            [['imageFiles'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 6],
            [['super_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuperCategory::class, 'targetAttribute' => ['super_category_id' => 'id']],
            [['bundle_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuperCategory::class, 'targetAttribute' => ['bundle_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'super_category_id' => 'Super kategoriya',
            'bundle_category_id' => 'Birsa sotib olinihi mumkin kategoriya',
            'is_stock' => 'Sotuvda mavjudmi',
            'start_count' => 'Reyting',
            'price' => 'Narxi',
            'status' => 'Xolati',
            'name' => 'Nomi',
            'characteristics' => 'Qisqa tavsif',
            'description' => 'Tavsif',
            'info' => 'Informatsiya',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getSuperCategory()
    {
        return $this->hasOne(SuperCategory::class, ['id' => 'super_category_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getBundleSuperCategory()
    {
        return $this->hasOne(SuperCategory::class, ['id' => 'bundle_category_id']);
    }


    /**
     * @return array[]|ActiveQuery
     */
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'uz' => 'Uzbek',
//                    'ru' => 'Русскый',
                    'en' => 'English',
                ],
                'attributes' => [
                    'name',
                    'characteristics',
                    'description',
                    'info',
                    'reviews',
                ]
            ],
            'galleryBehavior' => [
                'class' => GalleryBehavior::class,
                'type' => 'product', // Bu turdagi galereyani belgilash
//                'imageGalleryField' => 'imageFiles', // Rasm fayllari uchun
            ],
//            'galleryBehavior' => [
//                'class' => GalleryBehavior::class,
//                'type' => 'product',
//                'extension' => 'jpg',
//                'directory' => Yii::getAlias('@frontend/web') . '/uploads/product/gallery',
//                'url' => '/uploads/product/gallery',
//                'versions' => [
//                    'small' => function ($img) {
//                        /** @var ImageInterface $img */
//                        return $img
//                            ->copy()
//                            ->thumbnail(new Box(200, 200));
//                    },
//                    'medium' => function ($img) {
//                        /** @var ImageInterface $img */
//                        $dstSize = $img->getSize();
//                        $maxWidth = 800;
//                        if ($dstSize->getWidth() > $maxWidth) {
//                            $dstSize = $dstSize->widen($maxWidth);
//                        }
//                        return $img
//                            ->copy()
//                            ->resize($dstSize);
//                    },
//                ]
//            ],

            'slug' => [
                'class' => CyrillicSlugBehavior::class,
                'attribute' => 'name',
            ],
        ];
    }

    /**
     * @return MultilingualQuery|ActiveQuery
     */
    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }

    /**
     * @return ActiveQuery
     */
//    public function getGalleryImages()
//    {
//        return $this->hasMany(GalleryImage::class, ['ownerId' => 'id'])
//            ->andWhere(['type' => 'product'])
//            ->orderBy('rank ASC');
//    }

    /**
     * @return ActiveQuery
     */
//    public function getGalleryImagesAsArray()
//    {
//        return $this->getGalleryImages()->asArray();
//    }

    /**
     * All images of the product
     * @return array
     */
//    public function getImages($type = 'preview')
//    {
//        $images = $this->galleryImagesAsArray;
//        $result = [];
//        foreach ($images as $image) {
//            $result[] = "/uploads/product/gallery/$this->id/" . $image['id'] . "/$type.jpg";
//        }
//        return $result;
//
//    }

    /**
     * Main image of the product
     * @return string
     * //     */
//    public function getImage($type = 'preview')
//    {
//        $images = $this->getImages($type);
//        if (empty($images)) {
//            return "/images/no-image-png";
//        }
//        return $images[0] ?? '';
//    }

    /**
     * @param $userId
     * @return bool
     */
    public function getIsLiked($userId)
    {
        return UserProducts::find()
            ->andWhere(['user_id' => $userId, 'product_id' => $this->id])
            ->exists();
    }

    /**
     * @throws Exception
     */
    public function saveProductWithImages()
    {
        // Mahsulotni saqlash
        if ($this->validate()) {
            if ($this->save()) {
                $this->linkGalleryImages($this->imageFiles);
                return true;
            }
        }
        return false;
    }

    /**
     * @throws Exception
     */
    protected function linkGalleryImages($images)
    {
        foreach ($images as $image) {
            $galleryImage = new ProductGallery();
            $galleryImage->product_id = $this->id;
            $galleryImage->file_name = $image->name;

            // Define the directory where images will be stored
            $directory = Yii::getAlias('@frontend/web/uploads/product/' . $this->id);

            // Create the directory if it doesn't exist
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Define the path where the image will be saved
            $filePath = $directory . '/' . $image->baseName . '.' . $image->extension;

            // Move the uploaded file to the desired location
            if ($image->saveAs($filePath)) {
                $galleryImage->file_path = '/uploads/product/' . $this->id . '/' . $image->baseName . '.' . $image->extension;
                $galleryImage->save();
            }
        }
    }

    public function getGalleryImages()
    {
        return $this->hasMany(ProductGallery::class, ['product_id' => 'id']);
    }

    public function getImage($type = 'preview')
    {
        // Assuming 'getGalleryImages()' is properly set up to fetch the product images
        $images = $this->getGalleryImages()->all();
        if (count($images) > 0) {
            // Return the first image as the main image
            return Yii::$app->request->baseUrl . $images[0]->file_path;
        }
        return Yii::$app->request->baseUrl . '/images/no-image.png';  // Fallback if no image
    }
}
