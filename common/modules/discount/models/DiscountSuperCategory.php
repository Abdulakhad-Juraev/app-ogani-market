<?php

namespace common\modules\discount\models;

use common\modules\product\models\SuperCategory;

/**
 * This is the model class for table "discount_super_category".
 *
 * @property int $discount_id
 * @property int $super_category_id
 *
 * @property Discount $discount
 * @property SuperCategory $superCategory
 */
class DiscountSuperCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount_super_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discount_id', 'super_category_id'], 'required'],
            [['discount_id', 'super_category_id'], 'integer'],
            [['discount_id', 'super_category_id'], 'unique', 'targetAttribute' => ['discount_id', 'super_category_id']],
            [['super_category_id'], 'unique'],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discount::class, 'targetAttribute' => ['discount_id' => 'id']],
            [['super_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuperCategory::class, 'targetAttribute' => ['super_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'discount_id' => 'Chegirma',
            'super_category_id' => 'Super Kategoriya',
        ];
    }

    /**
     * Gets query for [[Discount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discount::class, ['id' => 'discount_id']);
    }

    /**
     * Gets query for [[SuperCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSuperCategory()
    {
        return $this->hasOne(SuperCategory::class, ['id' => 'super_category_id']);
    }
}
