<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\modules\discount\models\DiscountSuperCategory $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Chegirma va Super kategoriya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="discount-super-category-create">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
