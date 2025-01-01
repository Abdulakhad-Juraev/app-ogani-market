<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Faq $model */

$this->title = "View: ".$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qayta aloqa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="faq-view">
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
                    'name',
                    'email:email',
                    'message:ntext',
                    [
                        'attribute' => 's_date',
                        'format' => ['date', 'php:Y-m-d H:i:s']
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
