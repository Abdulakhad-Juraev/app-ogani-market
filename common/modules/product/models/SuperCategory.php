<?php

namespace common\modules\product\models;

use common\components\CyrillicSlugBehavior;
use common\modules\discount\models\DiscountSuperCategory;
use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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
class SuperCategory extends ActiveRecord
{
    use MultilingualLabelsTrait;
    public const STATUS_TRUE = 1;
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
            [['name'], 'required'],
            [['parent_id', 'status', 'is_favorite', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['parent_id'], 'validateParent'],
            [['image'], 'file'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuperCategory::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }


    public function behaviors()
    {
        return [
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'languages' => [
                    'uz' => 'Uzbek',
                    'en' => 'English',
//                    'ru' => 'Русскый',
                ],
                'attributes' => [
                    'name',
                ]
            ],

            'slug' => [
                'class' => CyrillicSlugBehavior::class,
                'attribute' => 'name',
            ],
            'image' => [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/super_category/{id}',
                'url' => '/uploads/super_category/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 960, 'quality' => 100],
//                    'preview' => ['width' => 500, 'height' => 500],
                ],
            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
//                'value' => new Expression('NOW()'),
            ],
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

    public function validateParent($attribute, $params)
    {
        if ($this->$attribute == $this->id) {
            $this->addError($attribute, 'Kategoriya o\'zini o\'zi parent qilib belgilay olmaydi.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'parent_id' => 'Ota kategoriyasi',
        ];
    }


    /**
     * Gets query for [[Parent]].
     *
     * @return ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(SuperCategory::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[SuperCategories]].
     *
     * @return ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(SuperCategory::class, ['parent_id' => 'id']);
    }
    public function renderCategoriesWithSubcategories($category, $visited = [], $isFirst = true)
    {
        // Agar kategoriya allaqachon ko'rilgan bo'lsa, uni qayta ishlamaymiz
        if (in_array($category->id, $visited)) {
            return '';
        }

        // Kategoriya ID'sini visited ro'yxatiga qo'shamiz
        $visited[] = $category->id;

        // Subkategoriyalarni olish
        $subcategories = SuperCategory::find()->andWhere(['parent_id' => $category->id])->all();

        // Kategoriya nomini tegga o‘rash va inline style qo‘shish
        if ($isFirst) {
            // Birinchi kategoriya uchun teg va uslub
            $tag = 'div';
            $class = 'mr-1'; // Birinchi kategoriya
            $html = "<{$tag} class='{$class}'>{$category->name}</{$tag}>";
            $isFirst = false;
        } elseif ($category->parent_id === null) {
            // Asosiy kategoriyalar uchun teg va uslub
            $tag = 'div';
            $class = 'badge badge-warning mr-1'; // Asosiy kategoriyalar
            $html = "<{$tag} class='{$class}'>{$category->name}</{$tag}>";
        } else {
            // Oddiy subkategoriyalar
            $tag = 'span';
            $class = 'badge badge-secondary mr-1'; // Oddiy subkategoriyalar
            $html = "<{$tag} class='{$class}'>{$category->name}</{$tag}>";
        }

        // Subkategoriyalarni rekursiv ishlash
        if (!empty($subcategories)) {
            foreach ($subcategories as $subcategory) {
                $html .= $this->renderCategoriesWithSubcategories($subcategory, $visited, $isFirst);
            }
        }

        return $html;
    }


    // Kategoriyalarni rekursiv tarzda olish
    public static function getCategoryList($parentId = null, $level = 0)
    {
        // Kategoriya va subkategoriyalarni olish
        $categories = self::find()
            ->andWhere(['parent_id' => $parentId, 'status' => 1])
            ->all();

        $categoryList = [];
        foreach ($categories as $category) {
            // Kategoriyani "level" bilan qo'shish
            $categoryList[$category->id] = str_repeat('--', $level) . $category->name;
            // Subkategoriyalarni rekursiv chaqirish
            $categoryList += self::getCategoryList($category->id, $level + 1);
        }

        return $categoryList;
    }

    public function getImageUrl($type = 'thumb')
    {
        return $this->getBehavior('image')->getThumbUploadUrl('image', $type);
    }


    /**
     * @return ActiveQuery
     */
    public function getAssignDiscountSuperCategory()
    {
        return $this->hasOne(DiscountSuperCategory::class, ['super_category_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['super_category_id' => 'id']);
    }

    /**
     * @return bool|int|string|null
     */
    public function getCategoryProductCount()
    {
        return $this->getProducts()->count();
    }

    public static function map(): array
    {
        return ArrayHelper::map(self::find()->andWhere(['status' => self::STATUS_TRUE])->all(), 'id', 'name');
    }
}



