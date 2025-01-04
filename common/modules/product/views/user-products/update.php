<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\product\models\UserProducts $model */

$this->title = 'Update User Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
