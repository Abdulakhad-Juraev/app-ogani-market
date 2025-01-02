<?php

use common\models\User;
use common\modules\auth\models\AuthItem;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\AuthAssignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->dropDownList(
        ArrayHelper::map(AuthItem::find()->all(),
            'name',
            function ($model) {
                return $model->name . " (" . $model->typeName . ")";
            }), [
        'prompt' => 'Tanlang',
    ]) ?>

    <?= $form->field($model, 'user_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(User::find()->all(), 'id', function ($model) {
            return " (" . $model->id . " ) (" . $model->username . ") (" . $model->email . ")";
        }),
        'options' => ['placeholder' => 'Tanlang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
