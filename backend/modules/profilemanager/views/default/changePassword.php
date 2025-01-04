<?php

use backend\modules\profilemanager\models\ChangePasswordForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model ChangePasswordForm */

$this->title = "Parolni o'zgartirish";
$this->params['breadcrumbs'][] = ['url' => ['index'], 'label' => 'Shaxsiy kabinet'];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h1 align="center"><?= $this->title ?></h1>
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, 'password')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'repassword')->textInput(['autofocus' => true]) ?>
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Bekor qilish', ['index'], ['class' => 'btn btn-warning']) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>

