<?php

namespace backend\models;

use yii\db\ActiveRecord;

class GalleryImage extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_image';
    }
}