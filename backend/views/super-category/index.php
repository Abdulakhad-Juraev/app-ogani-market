<?php

//use backend\models\SuperCategory;
//use yii\helpers\Html;
//use yii\helpers\Url;
//use yii\grid\ActionColumn;
//use yii\grid\GridView;
//
///** @var yii\web\View $this */
///** @var backend\models\search\SuperCategorySearch $searchModel */
///** @var yii\data\ActiveDataProvider $dataProvider */
//
//$this->title = 'Super Categories';
//$this->params['breadcrumbs'][] = $this->title;
//?>
<?php
//
//
///* @var $categories SuperCategory[] */
//
//function renderCategories($categories, $level = 0)
//{
//    foreach ($categories as $category) {
//        echo str_repeat('--', $level) . Html::encode($category->name) . "<br>";
//        renderCategories($category->children, $level + 1);
//    }
//}
//?>
<!---->
<!--<h1>Kategoriyalar</h1>-->
<!---->
<?php //renderCategories($categories); ?>
<!---->
<!--<div class="super-category-index">-->
<!---->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?php //= Html::a('Create Super Category', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!---->
<!--    --><?php //// echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--   <!-- -->--><?php ///*= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'name',
//            'parent_id',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, SuperCategory $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
//        ],
//    ]); */?>
<!---->
<!---->
<!--</div>-->

<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Kategoriyalar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model) {
            $level = substr_count($model['name'], '--'); // '--' belgisi asosida darajani aniqlash
            return ['class' => 'level-' . $level]; // Har bir daraja uchun sinf qo'shadi
        },
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'], // Raqamlar uchun ustun

            'id', // Kategoriya ID
            'name', // Kategoriya nomi (daraja bo'yicha ko'rsatiladi)
            [
                'attribute' => 'parent_id',
                'label' => 'Ota kategoriya ID',
                'value' => function ($model) {
                    return $model['parent_id'] ?: 'Bosh Kategoriya';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'], // CRUD uchun tugmalar
        ],
    ]); ?>
</div>

<style>
    .level-0 { background-color: #f9f9f9; }
    .level-1 { background-color: #e9e9ff; }
    .level-2 { background-color: #d9ffd9; }
</style>