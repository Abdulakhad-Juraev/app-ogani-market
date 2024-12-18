<?php

namespace backend\models;

use common\components\CyrillicSlugBehavior;
use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $category_id
 * @property string|null $slug
 *
 * @property BlogLang[] $blogLangs
 * @property BlogCategory $category
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['category_id'], 'integer'],
            [['slug'], 'string', 'max' => 255],
            [['image'], 'file'],
            [['title', 'short_desc', 'content'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'category_id' => 'Category ID',
            'slug' => 'Slug',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[BlogLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogLangs()
    {
        return $this->hasMany(BlogLang::class, ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BlogCategory::class, ['id' => 'category_id']);
    }

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
                    'title',
                    'short_desc',
                    'content',
                ]
            ],

            'slug' => [
                'class' => CyrillicSlugBehavior::class,
                'attribute' => 'title',
            ],
            'image' => [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/blog/{id}',
                'url' => '/uploads/blog/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 960, 'quality' => 100],
//                    'preview' => ['width' => 500, 'height' => 500],
                ],
            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'date',
                'updatedAtAttribute' => 'date',
//                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getImageUrl($type = 'thumb')
    {
        return $this->getBehavior('image')->getThumbUploadUrl('image', $type);
    }

}
