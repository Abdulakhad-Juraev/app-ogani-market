<?php

namespace backend\models;

use common\components\CyrillicSlugBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 *
 * @property TagsLang[] $tagsLangs
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
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
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[TagsLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagsLangs()
    {
        return $this->hasMany(TagsLang::class, ['owner_id' => 'id']);
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
