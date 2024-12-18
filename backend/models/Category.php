<?php

namespace backend\models;

use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name
 * @property int|null $status
 * @property int|null $is_favorite
 *
 * @property-read Product $products
 *
 */
class Category extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'is_favorite'], 'integer'],
            [['image'], 'file'],
            [['name', 'slug'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'status' => 'Status',
            'is_favorite' => 'Is Favorite',
        ];
    }

    /**
     * Gets query for [[CategoryLangs]].
     *
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
                ]
            ],
            'image' => [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/category/{id}',
                'url' => '/uploads/category/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 960, 'quality' => 100],
//                    'preview' => ['width' => 500, 'height' => 500],
                ],
            ]
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
     * @param $type
     * @return mixed
     */
    public function getImageUrl($type = 'thumb')
    {
        return $this->getBehavior('image')->getThumbUploadUrl('image', $type);
    }

    public static function getCategories()
    {
        return self::find()
//            ->select('name')
            ->where(['status' => '1'])
            ->orderBy(['id' => SORT_DESC])
            ->all();
    }

    /**
     * @return ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * @return bool|int|string|null
     */
    public function getCategoryProductCount()
    {
        return $this->getProducts()->count();
    }

}
