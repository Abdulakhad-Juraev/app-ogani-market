<?php

use backend\models\Order;
use common\models\User;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(User::find()->all(), 'id', function ($model) {
            return " (" . $model->id . " ) " .$model->username . " (" . $model->email . ")";
        }),
        'options' => ['placeholder' => 'Tanlang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

<!--    --><?php //= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_type')->dropDownList(Order::orderPaymentTypes(),
        ['prompt' => 'Select Payment Type']
    ) ?>

    <?= $form->field($model, 'order_type')->dropDownList(Order::orderTypes(),
        ['prompt' => 'Select Order Type']
    ) ?>

<!--    --><?php //= $form->field($model, 'total_price')->textInput() ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
