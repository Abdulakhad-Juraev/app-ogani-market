<?php

/** @var yii\web\View $this */
/** @var \common\modules\product\models\Product $model */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
<div class="product-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
