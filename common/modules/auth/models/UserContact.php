<?php

namespace common\modules\auth\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "user_contact".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $user_id
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $user
 */
class UserContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_contact';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
//                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'phone', 'address'], 'required'],
            [['user_id'], 'unique', 'message' => 'Bu userda kontakt mavjud'],
            [['user_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['firstname', 'lastname', 'phone', 'address'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Ism',
            'lastname' => 'Familiya',
            'phone' => 'Tel:',
            'address' => 'Manzil',
            'user_id' => 'Foydalananuvchi ID',
            'created_at' => 'Yaratilgan vaqti: ',
            'created_by' => 'Kim tomonidan qo\'shildi: ',
            'updated_at' => 'Yangilangan vaqti: ',
            'updated_by' => 'Kim tomonidan tahrirlandi: ',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
