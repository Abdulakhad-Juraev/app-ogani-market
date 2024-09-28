<?php

namespace backend\models;

use odilov\multilingual\behaviors\MultilingualBehavior;
use Yii;

/**
 * This is the model class for table "blog_category".
 *
 * @property int $id
 *
 * @property BlogCategoryLang[] $blogCategoryLangs
 * @property Blog[] $blogs
 */
class BlogCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[BlogCategoryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogCategoryLangs()
    {
        return $this->hasMany(BlogCategoryLang::class, ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[Blogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::class, ['category_id' => 'id']);
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
                    'name',
                ]
            ]
        ];
    }
}
