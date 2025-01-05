<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\modules\auth\models\UserComments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<!--<div class="user-comments-form">-->

<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?php //= $form->field($model, 'user_id')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'product_id')->textInput() ?>
<!---->
<!--    --><?php //= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?php //= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>

<!--</div>-->

<div class="user-comments-form">

    <?php $form = ActiveForm::begin([
        'id' => 'comment-form',
        'action' => Url::to(['/site/save-comment'])
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'product_id')->textInput() ?>
    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
