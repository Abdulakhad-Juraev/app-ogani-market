<?php

namespace backend\models;

use Yii;
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
            [['status'], 'integer'],
            [['name', 'percentage'], 'string', 'max' => 255],
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
            'percentage' => 'Percentage',
            'status' => 'Status',
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
