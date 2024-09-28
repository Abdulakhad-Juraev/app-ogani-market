<?php

namespace backend\models;

use common\components\CyrillicSlugBehavior;
use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use Yii;
use yii\db\ActiveQuery;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $is_stock
 * @property int|null $start_count
 * @property int|null $price
 * @property string|null $name
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var int
     */
    public const STOCK_TRUE = 1;
    public const STOCK_FALSE = 0;

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
            [['category_id', 'is_stock', 'start_count'], 'integer'],
            [['name', 'characteristics', 'description', 'info', 'reviews', 'slug', 'price'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'is_stock' => 'Is Stock',
            'start_count' => 'Start Count',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }


    /**
     * @return array[]|ActiveQuery
     */
    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'Uzbek',
                    'ru' => 'Русскый',
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
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@frontend/web') . '/uploads/product/gallery',
                'url' => '/uploads/product/gallery',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ],

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
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImage::class, ['ownerId' => 'id'])
            ->andWhere(['type' => 'product'])
            ->orderBy('rank ASC');
    }

    /**
     * @return ActiveQuery
     */
    public function getGalleryImagesAsArray()
    {
        return $this->getGalleryImages()->asArray();
    }

    /**
     * All images of the product
     * @return array
     */
    public function getImages($type = 'preview')
    {
        $images = $this->galleryImagesAsArray;
        $result = [];
        foreach ($images as $image) {
            $result[] = "/uploads/product/gallery/$this->id/" . $image['id'] . "/$type.jpg";
        }
        return $result;

    }

    /**
     * Main image of the product
     * @return string
     */
    public function getImage($type = 'preview')
    {
        $images = $this->getImages($type);
        if (empty($images)) {
            return "/images/no-image-png";
        }
        return $images[0] ?? '';
    }
}
