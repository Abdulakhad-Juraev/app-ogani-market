<?php

use common\modules\blog\models\Blog;
use common\modules\blog\models\BlogCategory;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var Blog $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title_uz')->textInput() ?>
<!--    --><?php //= $form->field($model, 'title_ru')->textInput() ?>
    <?= $form->field($model, 'title_en')->textInput() ?>

    <?= $form->field($model, 'short_desc_uz')->textInput() ?>
<!--    --><?php //= $form->field($model, 'short_desc_ru')->textInput() ?>
    <?= $form->field($model, 'short_desc_en')->textInput() ?>

    <?= $form->field($model, 'content_uz')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);

    ?>
    <?= $form->field($model, 'content_en')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);

    ?>
<!--    --><?php //= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'category_id')
        ->dropDownList(ArrayHelper::map(BlogCategory::find()->all(), 'id', 'name'), [
            'prompt' => 'Kategoriyani tanlang']); ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ])->label('Rasm'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
