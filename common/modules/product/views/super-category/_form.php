<?php

use common\modules\product\models\SuperCategory;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var SuperCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="super-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(
        ArrayHelper::map(SuperCategory::find()->all(), 'id', 'name'),
        ['prompt' => 'Ota kategoriyani tanlang']
    ) ?>

    <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>

</div>


