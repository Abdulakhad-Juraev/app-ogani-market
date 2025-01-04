<?php

use backend\modules\profilemanager\models\ChangePasswordForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model ChangePasswordForm */

$this->title = "Parolni o'zgartirish";
$this->params['breadcrumbs'][] = ['url' => ['index'], 'label' => 'Shaxsiy kabinet'];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container mt-5">
    <section class="content-header">
        <div class="row mb-2">
            <div class="col">
                <h2>Profile</h2>
            </div>
            <div class="col">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=Url::to(['/site/index']);?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=Url::to(['/site/profile']);?>">Profile</a></li>
                    <li class="breadcrumb-item"><a href="<?=Url::to(['/site/profile-manager']);?>">Profile Manager</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <h2 align="center"><?= $this->title ?></h2>
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
</div>

