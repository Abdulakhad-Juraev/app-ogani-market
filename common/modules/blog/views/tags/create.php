<?php

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\Tags $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Teglar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
<div class="tags-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
