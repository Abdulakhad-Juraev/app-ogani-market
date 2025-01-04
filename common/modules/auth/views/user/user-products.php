<?php

use common\modules\auth\models\search\UserContactSearch;
use common\modules\auth\models\User;
use common\modules\auth\models\UserContact;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;
use yii\grid\GridView;

/* @var $searchModel UserContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var User $model */

$this->title = 'Foydalanuvchi kontakti';
$this->params['breadcrumbs'][] = ['label' => 'Foydalanuvchilar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<?= $this->render('_tab-menu.php', ['model' => $model]); ?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-view">
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
                    ['attribute' => 'created_at', 'format' => ['date', 'php:Y-m-d H:i:s']],
                    ['attribute' => 'updated_at', 'format' => ['date', 'php:Y-m-d H:i:s']],
//                    'created_by',
//                    'updated_by',
//                    [
//                        'class' => ActionColumn::class,
//                        'urlCreator' => function ($action, UserContact $model) {
//                            return Url::toRoute(['/auth-manager/user-contact/' . $action, 'id' => $model->id]);
//                        }
//                    ],
                ],

            ]); ?>
        </div>
    </div>
</div>
