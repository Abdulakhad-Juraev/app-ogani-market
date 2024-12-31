<?php

use backend\models\search\SocialSearch;
use backend\models\Social;
use backend\views\GridComponent;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var SocialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ijtimoiy tarmoq';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="social-index">

                <p>
                    <?= Html::a('+', ['create'], ['class' => 'btn btn-primary ajax-btn-create']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
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
                            'filter' => GridComponent::getStatusFilterOptions(),
                            'format' => 'raw',
                            'value' => function ($model) {
                                return GridComponent::getStatusHtml($model->status);
                            },

                        ],
                        [
                            'class' => ActionColumn::class,
                            'urlCreator' => function ($action, Social $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            },
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<i class="fas fa-eye"></i>',
                                        Url::toRoute(['view', 'id' => $model->id]),
                                        [
                                            'class' => 'ajax-btn-view',
                                            'title' => 'View',
                                        ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<i class="fas fa-pencil-alt"></i>',
                                        Url::toRoute(['update', 'id' => $model->id]),
                                        [
                                            'class' => 'ajax-btn-update',
                                            'title' => 'Update',
                                        ]);
                                },
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>

<?php Modal::begin(['title' => $this->title, 'id' => 'ajax-modal']); ?>
    <div id="ajax-modal-content"></div>
<?php Modal::end(); ?>