<?php

use backend\models\Social;
use backend\views\GridComponent;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \backend\models\search\SocialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'url:url',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<img src={$model->imageUrl} alt='image' style='width:40px'>";
                },
            ],
            [
                'attribute' => 'status',
                'filter' => GridComponent::getStatusFilterOptions(),
                'format' => 'raw',
                'value' => function ($model) {
                    return GridComponent::getStatusHtml($model->status);
                },

            ],
//            'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Social $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
