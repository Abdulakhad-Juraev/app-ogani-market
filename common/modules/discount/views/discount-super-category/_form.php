<?php

use backend\models\SuperCategory;
use common\modules\discount\models\Discount;
use common\modules\discount\models\DiscountSuperCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var DiscountSuperCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="discount-super-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'discount_id')
        ->dropDownList(ArrayHelper::map(Discount::find()->andWhere(['status' => 1])->all(), 'id', 'name'), [
            'prompt' => 'Chegirmani tanlang']); ?>

    <?= $form->field($model, 'super_category_id')
        ->dropDownList(SuperCategory::getCategoryList(), [
            'prompt' => 'Super kategoriyani tanlang']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
