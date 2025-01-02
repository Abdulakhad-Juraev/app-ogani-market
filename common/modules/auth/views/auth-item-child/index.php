<?php

use common\modules\auth\models\AuthItemChild;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\search\AuthItemChildSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Q\'oshimcha ruhsatlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="auth-item-child-index">

            <p>
                <?= Html::a('+', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'parent',
                    'child',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, AuthItemChild $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'parent' => $model->parent, 'child' => $model->child]);
                        }
                    ],
                ],
            ]); ?>


        </div>
    </div>
</div>
