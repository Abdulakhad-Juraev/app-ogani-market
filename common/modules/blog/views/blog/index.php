<?php

use common\modules\blog\models\Blog;
use common\modules\blog\models\search\BlogSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var BlogSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'title',
                    [
                        'attribute' => 'category_id',
                        'format' => 'raw',
                        'filter'=>\common\modules\blog\models\BlogCategory::map(),
                        'value' => function ($model) {
                            return $model->category->name ?? '';
                        },
                    ],
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return "<img src={$model->imageUrl} alt='image' style='width:40px'>";
                        },
                    ],
                    [   'attribute' => 'date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Blog $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>
