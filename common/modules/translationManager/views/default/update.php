<?php

use common\modules\translationmanager\models\SourceMessage;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model SourceMessage */

$this->title = 'Редактировать Translation: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="source-message-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
