<?php

use common\modules\auth\models\search\UserCommentsSearch;
use common\modules\auth\models\User;
use common\modules\auth\models\UserComments;
use common\widgets\helpers\Html;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\web\YiiAsset;
use yii\grid\GridView;

/* @var $searchModel UserCommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var User $model */

$this->title = 'Foydalanuvchi komments';
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<?= $this->render('_tab-menu.php', ['model' => $model]); ?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-view">
            <p>
                <?= Html::a('+', ['/auth-manager/user-comments/create', 'user_id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
            <br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'product_id',
                        'value' => function ($model) {
                            return (("(" . $model->product->id . ")" ?? '') . " " . ($model->product->name ?? ''));
                        }
                    ],
                    'message:ntext',
                    ['attribute' => 'created_at', 'format' => ['date', 'php:Y-m-d H:i:s']],
                    ['attribute' => 'updated_at', 'format' => ['date', 'php:Y-m-d H:i:s']],
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, UserComments $model) {
                            return Url::toRoute(['/auth-manager/user-comments/' . $action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
