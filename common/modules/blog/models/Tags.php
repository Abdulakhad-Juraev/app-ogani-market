<?php

namespace common\modules\blog\models;

use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "tags".
 * @property int $id
 * @property string $name
 */
class Tags extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;
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
}
