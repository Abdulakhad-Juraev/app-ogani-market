<?php

use common\modules\auth\models\AuthItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\search\AuthItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ruhsat turlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
<div class="auth-item-index">

    <p>
        <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getTypeName() ?? '';
                }
            ],
            'description:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, AuthItem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'name' => $model->name]);
                }
            ],
        ],
    ]); ?>


</div>
</div>
</div>
