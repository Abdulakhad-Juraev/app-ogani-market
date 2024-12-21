<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "super_category".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $parent_id
 *
 * @property SuperCategory $parent
 * @property SuperCategory[] $superCategories
 */
class SuperCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'super_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuperCategory::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(SuperCategory::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[SuperCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(SuperCategory::class, ['parent_id' => 'id']);
    }
}
