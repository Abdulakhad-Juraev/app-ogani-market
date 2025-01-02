<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\AuthAssignment $model */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Ruhsatlar biriktirish', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="auth-assignment-view">
            <p>
                <?= Html::a('Update', ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'item_name',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return ($model->itemName->name ." (".$model->itemName->typeName.")") ?? '';
                        }
                    ],
                    [
                        'attribute' => 'user_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->user->username ?? '';
                        }
                    ],
                    ['attribute' => 'created_at',
                        'format' => ['date', 'php:Y-d-m H:i:s']
                    ]
                ],
            ]) ?>

        </div>
    </div>
</div>
