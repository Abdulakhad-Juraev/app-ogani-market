<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\AuthAssignment $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Ruhsatlar biriktirish', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
<div class="auth-assignment-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
