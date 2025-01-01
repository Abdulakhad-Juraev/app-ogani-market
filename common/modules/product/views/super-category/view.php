<?php

use backend\views\GridComponent;
use common\modules\product\models\SuperCategory;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var SuperCategory $model */

$this->title = "View: " . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Super Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="super-category-view">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                    'id',
                    'name_uz',
                    'name_en',
                    'parent_id',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusHtml($model->status);
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>
