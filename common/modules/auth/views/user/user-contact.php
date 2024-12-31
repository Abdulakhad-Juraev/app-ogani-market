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

$this->title = 'Salomlar';
$this->params['breadcrumbs'][] = ['label' => 'Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

?>
<div class="discount-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create User Contact', ['/auth-manager/user-contact/create', 'user_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_tab-menu.php', ['model' => $model]); ?>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname',
            'lastname',
            'phone',
            'address',
//            'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, UserContact $model) {
                    return Url::toRoute(['/auth-manager/user-contact/' . $action, 'id' => $model->id]);
                }
            ],
        ],

    ]); ?>
</div>
