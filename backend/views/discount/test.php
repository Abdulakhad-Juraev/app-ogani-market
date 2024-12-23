<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\grid\GridView;
use backend\models\search\DiscountSuperCategorySearch;

/* @var $searchModel DiscountSuperCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var backend\models\Discount $model */
$this->title = 'Salomlar';
$this->params['breadcrumbs'][] = ['label' => 'Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

?>
<div class="discount-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_tab-menu.php', ['model' => $model]); ?>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'super_category_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->superCategory->name ?? '';
                }
            ]
        ],
    ]); ?>
</div>
