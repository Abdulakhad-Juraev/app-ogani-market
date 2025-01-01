<?php

namespace backend\models;

use common\components\CyrillicSlugBehavior;
use common\modules\discount\models\DiscountSuperCategory;
use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use odilov\multilingual\db\MultilingualLabelsTrait;
use odilov\multilingual\db\MultilingualQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
            'name' => 'Name',
            'parent_id' => 'Parent ID',
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

    /*public function renderCategoriesWithSubcategories($category)
    {
        $tag = $category->parent_id ? 'span' : 'div';
        $class = $category->parent_id ? 'badge badge-warning ml-1' : 'badge badge-primary ml-1';

        $html = "<{$tag} class='{$class}'> {$category->name} </{$tag}>";

        // Subkategoriyalarni olish
        $subcategories = SuperCategory::find()->andWhere(['parent_id' => $category->id])->all();

        // Subkategoriyalarni rekursiv ishlash
        if (!empty($subcategories)) {
            foreach ($subcategories as $subcategory) {
                $html .= $this->renderCategoriesWithSubcategories($subcategory);
            }
        }

        return $html;
    }*/

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
        $categories = self::find()->where(['parent_id' => $parentId])->all();

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


}



