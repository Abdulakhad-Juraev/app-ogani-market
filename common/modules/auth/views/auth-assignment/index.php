<?php

use common\modules\auth\models\AuthAssignment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\search\AuthAssignmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ruhsatlar biriktirish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="auth-assignment-index">
            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->user->username ?? '';
                        }
                    ],
                    [
                        'attribute' => 'item_name',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return ($model->itemName->name ." (".$model->itemName->typeName.")") ?? '';
                        }
                    ],
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, AuthAssignment $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>
