<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\UserContact $model */

$this->title = 'Create User Contact';
$this->params['breadcrumbs'][] = ['label' => 'User Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="user-contact-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
