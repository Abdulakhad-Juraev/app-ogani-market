<?php

use backend\models\DiscountSuperCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\DiscountSuperCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Discount Super Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-super-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Discount Super Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'discount_id',
            'super_category_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DiscountSuperCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'discount_id' => $model->discount_id, 'super_category_id' => $model->super_category_id]);
                 }
            ],
        ],
    ]); ?>


</div>
