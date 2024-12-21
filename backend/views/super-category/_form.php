<?php

use backend\models\SuperCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\SuperCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="super-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(SuperCategory::find()->all(), 'id', 'name'),
        ['prompt' => 'Ota kategoriyani tanlang']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


