<?php

use common\modules\product\models\Product;
use common\modules\product\models\SuperCategory;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col"><?= $form->field($model, 'name_uz')->textInput() ?></div>
        <!--        <div class="col-4">--><?php //= $form->field($model, 'name_ru')->textInput() ?><!--</div>-->
        <div class="col"><?= $form->field($model, 'name_en')->textInput() ?></div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'characteristics_uz')->textarea() ?></div>
        <!--        <div class="col">--><?php //= $form->field($model, 'characteristics_ru')->textarea() ?><!--</div>-->
        <div class="col"><?= $form->field($model, 'characteristics_en')->textarea() ?></div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'description_uz')->textarea() ?></div>
        <!--        <div class="col">--><?php //= $form->field($model, 'description_ru')->textarea() ?><!--</div>-->
        <div class="col"><?= $form->field($model, 'description_en')->textarea() ?></div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'info_uz')->textarea() ?></div>
        <!--        <div class="col">--><?php //= $form->field($model, 'info_ru')->textarea() ?><!--</div>-->
        <div class="col"><?= $form->field($model, 'info_en')->textarea() ?></div>
    </div>


    <div class="row">
        <div class="col-12"> <?= $form->field($model, 'super_category_id')
                ->dropDownList(SuperCategory::getCategoryList(), [
                    'prompt' => 'Kategoriyani tanlang']); ?></div>
        <div class="col-12"> <?= $form->field($model, 'bundle_category_id')
                ->dropDownList(SuperCategory::getCategoryList(), [
                    'prompt' => 'Birsa sotib olinihi mumkin kategoriya tanlang']); ?></div>
        <div class="col-2">
            <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'start_count')->textInput(['type' => 'number', 'min' => 0, 'max' => 5]) ?>
        </div>
        <!--        <div class="col-3">-->
        <!--            --><?php //= $form->field($model, 'discount_price')->textInput() ?>
        <!--        </div>-->
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]); ?>
        <div class="col-12">
            <?= $form->field($model, 'is_stock')->widget(SwitchInput::class) ?>
            <?= $form->field($model, 'status')->widget(SwitchInput::class) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
