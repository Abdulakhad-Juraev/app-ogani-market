<?php

use backend\views\GridComponent;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Social $model */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
                'format' => 'raw',
                'value' => function ($model) {
                    return GridComponent::getStatusHtml($model->status);
                },

            ],
            [
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDatetime($model->created_at, 'php:H:i:s d-m-Y') ?? ''
            ],
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy->username ?? '';
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => Yii::$app->formatter->asDatetime($model->updated_at, 'php:H:i:s d-m-Y') ?? ''
            ],
            [
                'attribute' => 'updated_by',
                'value' => function ($model) {
                    return $model->updatedBy->username ?? '';
                }
            ],
        ],
    ]) ?>

</div>
