<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\auth\models\User;
use common\modules\auth\models\UserContact;

/** @var UserContact $contact */
/** @var User $user */


?>
<div class="card card-success card-outline">
    <div class="card-header">
        <?php $form = ActiveForm::begin([
            'id' => 'user-profile-update-form',
            'options' => ['class' => 'form-horizontal'],
        ]); ?>

        <div class="form-group row">
            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <?= $form->field($user, 'username')->textInput(['disabled' => true])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <?= $form->field($user, 'email')->textInput(['disabled' => true, 'id' => 'user-profile-email'])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <?= $form->field($contact, 'firstname')->textInput(['disabled' => true, 'id' => 'user-profile-firstname'])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <?= $form->field($contact, 'lastname')->textInput(['disabled' => true, 'id' => 'user-profile-lastname'])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <?= $form->field($contact, 'phone')->textInput(['disabled' => true, 'id' => 'user-profile-phone'])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <?= $form->field($contact, 'address')->textInput(['disabled' => true, 'id' => 'user-profile-address'])->label(false) ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <?= Html::button('Edit', ['class' => 'btn btn-warning user-profile-update-btn']) ?>
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary user-profile-save-btn d-none']) ?>
                <?= Html::a('Update password and username', '/site/profile-manager/', ['class' => 'btn btn-secondary user-profile-password-update-btn']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

