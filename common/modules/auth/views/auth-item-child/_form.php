<?php

use common\modules\auth\models\AuthItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\AuthItemChild $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')
        ->dropDownList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'),
            ['prompt' => 'Tanlang']); ?>

    <?= $form->field($model, 'child')
        ->dropDownList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'),
            ['prompt' => 'Tanlang']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
