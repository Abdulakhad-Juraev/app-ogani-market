<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\product\models\UserProducts $model */

$this->title = 'Create User Products';
$this->params['breadcrumbs'][] = ['label' => 'User Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
