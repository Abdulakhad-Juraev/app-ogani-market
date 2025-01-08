<?php

namespace common\modules\blog\models;

use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "blog_category".
 *
 * @property int $id
 * @property Blog[] $blogs
 * @property string $name
 */
class BlogCategory extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

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
            [['name'], 'required'],
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
            'name' => 'Nomi',
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
//                    'ru' => 'Русскый',
                    'en' => 'English',
                ],
                'attributes' => [
                    'name',
                ]
            ]
        ];
    }

    /**
     * @return bool|int|string|null
     */
    public function getBlogCount()
    {
        return $this->getBlogs()->count();
    }
}
