<?php

use backend\models\Discount;
use backend\models\SuperCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DiscountSuperCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="discount-super-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'discount_id')
        ->dropDownList(ArrayHelper::map(Discount::find()->all(), 'id', 'name'), [
            'prompt' => 'Chegirmani tanlang']); ?>

    <?= $form->field($model, 'super_category_id')
        ->dropDownList(SuperCategory::getCategoryList(), [
            'prompt' => 'Super kategoriyani tanlang']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
