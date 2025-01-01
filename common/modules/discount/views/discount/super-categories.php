<?php

use common\modules\discount\models\search\DiscountSuperCategorySearch;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\YiiAsset;

/* @var $searchModel DiscountSuperCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/** @var \common\modules\discount\models\Discount $model */
$this->title = 'Chegirma';
$this->params['breadcrumbs'][] = ['label' => 'Chegirma', 'url' => ['index']];
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
                        'attribute' => 'super_category_id',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return $model->superCategory->name ?? '';
                        }
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>
