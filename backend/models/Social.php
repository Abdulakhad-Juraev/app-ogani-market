<?php

namespace backend\models;

use common\modules\auth\models\User;
use mohorev\file\UploadImageBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Exception;
use yii\db\Expression;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $image
 * @property int|null $status
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Social extends \yii\db\ActiveRecord
{
    public const STATUS_TRUE = 1;
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['url'], 'string', 'max' => 255],
//            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'image' => 'Rasm',
            'status' => 'Xolati',
            'created_at' => 'Yaratilgan vaqti: ',
            'created_by' => 'Kim tomonidan qo\'shildi: ',
            'updated_at' => 'Yangilangan vaqti: ',
            'updated_by' => 'Kim tomonidan tahrirlandi: ',
        ];
    }

    public function behaviors()
    {
        return [
//            'image' => [
//                'class' => UploadImageBehavior::class,
//                'attribute' => 'image',
//                'scenarios' => ['default'],
//                'path' => '@frontend/web/uploads/social/{id}',
//                'url' => '/uploads/social/{id}',
//                'thumbs' => [
//                    'thumb' => ['width' => 960, 'quality' => 100],
////                    'preview' => ['width' => 500, 'height' => 500],
//                ],
//            ],
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

    public function getImageUrl($type = 'thumb')
    {
        return $this->getBehavior('image')->getThumbUploadUrl('image', $type);
    }


    /**
     * @throws Exception
     */
    public function saveImage()
    {
        $folder = Yii::getAlias('@frontend/web/uploads/social/' . $this->id);

        $newFileName = $this->imageFile->baseName . '_' . date('Y-m-d_H-i-s') . '.' . $this->imageFile->extension;
        $filePath = $folder . '/' . $newFileName;

        if ($this->imageFile->saveAs($filePath)) {
            $this->image = '/uploads/social/' . $this->id . '/' . $newFileName;
            $this->save(false);
        }
    }

}
