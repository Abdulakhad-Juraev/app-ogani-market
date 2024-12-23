<?php


use backend\models\Discount;
use yii\bootstrap4\Tabs;
use yii\web\View;

/* @var $this View */
/* @var $model Discount */

?>


<?= Tabs::widget([

    'items' => [

        [
            'label' => 'Skidka xaqida',
            'url' => ['/discount/view', 'id' => $model->id],
            'icon' => 'question-circle,far',
        ],
        [
            'label' => 'Подкатегории',
            'url' => ['/discount/test', 'id' => $model->id],
            'icon' => 'tasks,fas',
        ],
        [
            'label' => 'Особенности категории',
//            'url' => ['/product-manager/category/character', 'id' => $model->id],
            'icon' => 'tasks,fas',
        ],
        [
            'label' => 'Продукты',
//            'url' => ['/product-manager/category/product', 'id' => $model->id],
            'icon' => 'tasks,fas',
        ],
    ]
]) ?>
