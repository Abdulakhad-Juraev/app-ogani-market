<?php

use backend\models\Faq;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\FaqSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Qayta aloqa';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="faq-index">
            <p>
<!--                --><?php //= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'email:email',
                    'message:ntext',
                     [
                        'attribute' => 's_date',
                        'format' => ['date', 'php:Y-m-d H:i:s']
                    ],
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Faq $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
