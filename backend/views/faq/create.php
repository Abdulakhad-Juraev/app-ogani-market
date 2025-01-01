<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Faq $model */

$this->title = 'Qayta aloqa';
$this->params['breadcrumbs'][] = ['label' => 'Qayta aloqa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="faq-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
