<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Discount $model */

$this->title = 'Create Discount';
$this->params['breadcrumbs'][] = ['label' => 'Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
