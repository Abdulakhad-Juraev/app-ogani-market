<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var LoginForm $model */

use common\models\LoginForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php $form = ActiveForm::begin(); ?>
        <div class="mb-6">
            <?= $form->field($model, 'username')->textInput(['placeholder' => "admin"]) ?>
        </div>
        <div class="mb-3">
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "admin123"]) ?>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-12 mt-3">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php $form = ActiveForm::end(); ?>

    </div>
    <!-- /.login-card-body -->
</div>
