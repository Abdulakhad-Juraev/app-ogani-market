<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\UserComments $model */

$this->title = 'Create User Comments';
$this->params['breadcrumbs'][] = ['label' => 'User Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
