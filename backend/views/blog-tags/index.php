<?php

use backend\models\BlogTags;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\BlogTagsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Blog Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-tags-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blog Tags', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'blog_id',
            'tags_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlogTags $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'blog_id' => $model->blog_id, 'tags_id' => $model->tags_id]);
                 }
            ],
        ],
    ]); ?>


</div>
