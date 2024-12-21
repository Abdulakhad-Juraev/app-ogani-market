<?php

use yii\grid\GridView;
use yii\helpers\Html;
use backend\models\SuperCategory;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var backend\models\search\SuperCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Super Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="super-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Super Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->renderCategoriesWithSubcategories($model);
                }
            ],
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($model) {

                    $badgeClass = $model->parent ? 'badge-secondary p-1' : 'badge-primary p-1';
                    $badgeText = $model->parent ? ($model->parent->name." <div class='badge badge-warning ml-1 p-1'>sub-categoriya</div>") : 'Super kategoriya';

                    return Html::tag('div', $badgeText, ['class' => "badge  $badgeClass"]);

                }
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, SuperCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>
