<?php

use common\modules\blog\models\BlogTags;
use common\modules\blog\models\Tags;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var BlogTags $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blog-tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'blog_id')->textInput(); ?>

    <?= $form->field($model, 'tags_id')->dropDownList(ArrayHelper::map(Tags::find()->all(), 'id', 'name'), [
        'prompt' => 'Tanlang ...'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
