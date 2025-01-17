<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\product\models\ProductGallery $model */

$this->title = 'Create Product Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Product Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
