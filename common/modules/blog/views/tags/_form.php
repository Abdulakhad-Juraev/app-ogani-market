<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \common\modules\blog\models\Tags $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput() ?>
    <?= $form->field($model, 'name_en')->textInput() ?>
<!--    --><?php //= $form->field($model, 'name_ru')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
