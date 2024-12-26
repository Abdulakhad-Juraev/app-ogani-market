<?php

use kartik\file\FileInput;
use kartik\switchinput\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>
        <div class="category-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-4">
                    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-4">
                    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-4">
                    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'image')->widget(FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                    ])->label('Rasm'); ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'status')->widget(SwitchInput::class, []) ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'is_favorite')->widget(SwitchInput::class, []) ?>
                </div>

            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
