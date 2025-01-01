<?php

use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogTags;
use common\modules\blog\models\search\BlogTagsSearch;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $searchModel BlogTagsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var Blog $model */
$this->title = 'Blog';
$this->params['breadcrumbs'][] = ['label' => 'Blog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

?>
<?= $this->render('_tab-menu.php', ['model' => $model]); ?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-view">
            <p>
                <?= Html::a('+', ['blog-tags/create', 'blog_id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
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
                            return Url::toRoute(["blog-tags/" . $action, 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
