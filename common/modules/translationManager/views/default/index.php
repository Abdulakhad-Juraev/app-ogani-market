<?php

use common\modules\translationmanager\models\SourceMessageSearch;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel SourceMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarjimalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="source-message-index row">
            <div class="col-xs-12">
                <a href="<?=\yii\helpers\Url::to(['create'])?>" class="btn btn-success">Qoshish</a>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <span class="label label-default"> </span>
<!--                        <span class="label label-default">записей --><?php //= $dataProvider->getCount()?><!-- из --><?php //= $dataProvider->getTotalCount()?><!--</span>-->
                    </div>
                    <div class="box-body">
                        <?= GridView::widget([
                            'summary' => '',
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => Yii::$app->controller->module->grid_column,
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
