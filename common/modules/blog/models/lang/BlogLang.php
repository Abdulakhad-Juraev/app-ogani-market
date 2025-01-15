<?php

namespace common\modules\blog\models\lang;

use common\modules\blog\models\Blog;
use Yii;

/**
 * This is the model class for table "blog_lang".
 *
 * @property int $id
 * @property int|null $owner_id
 * @property string|null $language
 * @property string|null $title
 * @property string|null $short_desc
 * @property string|null $content
 *
 * @property Blog $owner
 */
class BlogLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id'], 'integer'],
            [['language'], 'string', 'max' => 6],
            [['title', 'short_desc', 'content'], 'string', 'max' => 255],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::class, 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'language' => 'Language',
            'title' => 'Title',
            'short_desc' => 'Short Desc',
            'content' => 'Content',
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Blog::class, ['id' => 'owner_id']);
    }
}
