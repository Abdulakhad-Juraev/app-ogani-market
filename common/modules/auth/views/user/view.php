<?php

use backend\views\GridComponent;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= $this->render('_tab-menu', ['model' => $model]); ?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="user-view">
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
                    'username',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return GridComponent::getStatusUser($model->status);
                        },

                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-h-d H:i:s']
                    ],
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
//            'updated_at',
//            'verification_token',
                ],
            ]) ?>

        </div>
    </div>
</div>
