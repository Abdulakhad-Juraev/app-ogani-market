<?php

use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--    --><?php //= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <!--    --><?php //= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <!--    --><?php //= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <!--    --><?php //= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <!--    --><?php //= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?php
    $model->status = ($model->status == 10) ? 1 : 0;
    echo $form->field($model, 'status')->widget(SwitchInput::class);

    ?>

    <!--    --><?php //= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><?php //= $form->field($model, 'updated_at')->textInput() ?>

    <!--    --><?php //= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
