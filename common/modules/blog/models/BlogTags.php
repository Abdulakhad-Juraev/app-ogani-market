<?php

namespace common\modules\blog\models;

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
//            [['tags_id','blog_id'], 'unique', 'targetAttribute' => ['tags_id','blog_id']],
            [['blog_id', 'tags_id'], 'validateUniqueCombination'],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::class, 'targetAttribute' => ['blog_id' => 'id']],
            [['tags_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['tags_id' => 'id']],
        ];
    }

    public function validateUniqueCombination($attribute, $params)
    {
        $exists = self::find()
            ->andWhere(['blog_id' => $this->blog_id, 'tags_id' => $this->tags_id])
            ->exists();

        if ($exists) {
            $this->addError('tags_id', 'Комбинация должна быть уникальной.');
        }
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_id' => 'Blog',
            'tags_id' => 'Teg',
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
