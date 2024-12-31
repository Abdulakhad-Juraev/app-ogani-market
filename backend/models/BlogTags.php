<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "blog_tags".
 *
 * @property int $blog_id
 * @property int $tags_id
 *
 * @property Blog $blog
 * @property Tags $tags
 */
class BlogTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'tags_id'], 'required'],
            [['blog_id', 'tags_id'], 'integer'],
            [['blog_id', 'tags_id'], 'unique', 'targetAttribute' => ['blog_id', 'tags_id']],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::class, 'targetAttribute' => ['blog_id' => 'id']],
            [['tags_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['tags_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_id' => 'Blog ID',
            'tags_id' => 'Tags ID',
        ];
    }

    /**
     * Gets query for [[Blog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::class, ['id' => 'blog_id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasOne(Tags::class, ['id' => 'tags_id']);
    }
}
