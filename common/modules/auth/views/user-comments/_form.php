<?php

use common\modules\auth\models\User;
use common\modules\product\models\Product;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\UserComments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php /*= $form->field($model, 'user_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(User::find()->all(), 'id', function ($model) {
            return " (" . $model->id . " ) (" . $model->username . ") (" . $model->email . ")";
        }),
        'options' => ['placeholder' => 'Tanlang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    */?>

    <?= $form->field($model, 'product_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(Product::find()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Tanlang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

<!--    --><?php //= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'created_by')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'updated_at')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
