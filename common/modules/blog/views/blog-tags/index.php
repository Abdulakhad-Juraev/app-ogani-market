<?php

use common\modules\blog\models\BlogTags;
use common\modules\blog\models\search\BlogTagsSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var BlogTagsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Blog va Teg';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="blog-tags-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary disabled']) ?>
                <?= Html::tag('span', 'ma\'lumot faqat blog orqali qo\'shiladi', ['class' => 'text-red']); ?>

            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'blog_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->blog->title ?? '';
                        }
                    ],
                    [
                        'attribute' => 'tags_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->tags->name ?? '';
                        }
                    ],
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, BlogTags $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id]);
                        }
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
