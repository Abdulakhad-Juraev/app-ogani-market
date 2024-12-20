<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Assalomu alaykum <?= Html::encode($user->username) ?>,</p>

    <p>Akkauntingizni faollashtirish uchun havolaga ga kiring, keyin elektron pochta manzilingiz tasdiqlanadi:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>
