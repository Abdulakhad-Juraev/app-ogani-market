<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\UserContact $model */

$this->title = 'Create User Contact';
$this->params['breadcrumbs'][] = ['label' => 'User Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
