<?php

namespace common\modules\discount\models;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "discount".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $percentage
 * @property int|null $status
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percentage', 'name'], 'required'],
            [['status'], 'integer'],
            [['name', 'percentage'], 'string', 'max' => 255],
            [['percentage'], 'number', 'min' => -100, 'max' => 100],
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
            'percentage' => 'Foiz %',
            'status' => 'Xolati',
        ];
    }


    /**
     * @return ActiveQuery
     */
    public function getSuperCategoriesByDiscount(): ActiveQuery
    {
        return $this->hasMany(DiscountSuperCategory::class, ['discount_id' => 'id']);
    }
}
