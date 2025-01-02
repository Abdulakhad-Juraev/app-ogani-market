<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\UserContact $model */

$this->title = 'Update User Contact: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card card-outline card-primary">
    <div class="card-body">
<div class="user-contact-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
