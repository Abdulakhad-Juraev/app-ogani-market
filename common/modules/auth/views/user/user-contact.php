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
            <p>
                <?= Html::a('Create User Contact +', ['/auth-manager/user-contact/create', 'user_id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
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
                    //'created_at',
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
    </div>
</div>
