<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var Faq $model */

use backend\models\Faq;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app', 'contact'); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= Url::to(['site/index']) ?>">
                            <?= Yii::t('app', 'home'); ?></a>
                        <span><?= Yii::t('app', 'contact'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4><?= Yii::t('app', 'phone'); ?></h4>
                    <p><?= Yii::t('app', 'tel_raqam'); ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4><?= Yii::t('app', 'address'); ?></h4>
                    <p><?= Yii::t('app', 'address_manzil'); ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4><?= Yii::t('app', 'work_time'); ?></h4>
                    <p><?= Yii::t('app', 'ish_vaqti_manzili'); ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4><?= Yii::t('app', 'email'); ?></h4>
                    <p>hello@colorlib.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6074.079671909463!2d71.70072099134065!3d40.430116800810495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb9d97b05e6cd9%3A0x100b6ede0884c808!2z0J_RgtC40YbQsCDQpdGD0LzQvg!5e0!3m2!1sru!2s!4v1706262895572!5m2!1sru!2s"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Uzbekistan</h4>
            <ul>
                <li><?= Yii::t('app', 'phone'); ?>: <?= Yii::t('app', 'tel_raqam'); ?></li>
                <li><?= Yii::t('app', 'address_manzil'); ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2><?= Yii::t('app', 'leave_message'); ?></h2>
                </div>
            </div>
        </div>

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'form_name')])->label('') ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app', 'form_email')])->label('') ?>
            </div>
            <div class="col-lg-12 text-center">
                <?= $form->field($model, 'message')->textarea(['placeholder' => Yii::t('app', 'leave_message')])->label('') ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'send_message'), ['class' => 'site-btn']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<!-- Contact Form End -->

