<?php

use common\modules\translationmanager\models\SourceMessage;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model SourceMessage */

$this->title = 'Tarjima qoshish';
$this->params['breadcrumbs'][] = ['label' => 'Tarjimalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
