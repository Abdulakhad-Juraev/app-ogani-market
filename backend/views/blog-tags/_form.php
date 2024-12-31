<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\BlogTags $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blog-tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blog_id')->textInput() ?>

    <?= $form->field($model, 'tags_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
