<?php

use common\modules\auth\models\User;
use common\modules\product\models\search\UserProductsSearch;
use yii\web\YiiAsset;
use yii\grid\GridView;

/* @var $searchModel UserProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var User $model */

$this->title = 'Sevimli mahsulotlar';
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
                ],
            ]); ?>
        </div>
    </div>
</div>
