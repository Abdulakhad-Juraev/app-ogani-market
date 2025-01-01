<?php

use common\modules\product\models\SuperCategory;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var SuperCategory $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Super kategoriya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
<div class="super-category-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
