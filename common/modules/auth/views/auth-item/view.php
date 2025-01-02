<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\AuthItem $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ruhsat turlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="auth-item-view">
            <p>
                <?= Html::a('Update', ['update', 'name' => $model->name], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'name' => $model->name], [
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
                    'name',
                    [
                        'attribute' => 'type',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->typeName ?? '';
                        }
                    ],
                    'description:ntext',
                    ['attribute' => 'created_at',
                        'format' => ['date', 'php:Y-d-m H:i:s']
                    ],
                    ['attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-d-m H:i:s']
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
