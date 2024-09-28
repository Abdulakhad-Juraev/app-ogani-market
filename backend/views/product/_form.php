<?php

use backend\models\Category;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-4"><?= $form->field($model, 'name_uz')->textInput() ?></div>
        <div class="col-4"><?= $form->field($model, 'name_ru')->textInput() ?></div>
        <div class="col-4"><?= $form->field($model, 'name_en')->textInput() ?></div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'characteristics_uz')->textarea() ?></div>
        <div class="col"><?= $form->field($model, 'characteristics_ru')->textarea() ?></div>
        <div class="col"><?= $form->field($model, 'characteristics_en')->textarea() ?></div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'description_uz')->textarea() ?></div>
        <div class="col"><?= $form->field($model, 'description_ru')->textarea() ?></div>
        <div class="col"><?= $form->field($model, 'description_en')->textarea() ?></div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'reviews_uz')->textarea() ?></div>
        <div class="col"><?= $form->field($model, 'reviews_ru')->textarea() ?></div>
        <div class="col"><?= $form->field($model, 'reviews_en')->textarea() ?></div>
    </div>


    <div class="row">
        <div class="col-4"> <?= $form->field($model, 'category_id')
                ->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'), [
                    'prompt' => 'Kategoriyani tanlang']); ?></div>
        <div class="col-4"><?= $form->field($model, 'start_count')->textInput(['type' => 'number', 'min' => 0, 'max' => 5]) ?></div>
        <div class="col-4">
            <?= $form->field($model, 'price')->textInput() ?>
            <?= $form->field($model, 'is_stock')->widget(SwitchInput::classname(), []) ?></div>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
