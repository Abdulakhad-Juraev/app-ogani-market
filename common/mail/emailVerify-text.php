<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Assalomu alaykum <?= $user->username ?>,

Akkauntingizni faollashtirish uchun havolaga ga kiring, keyin elektron pochta manzilingiz tasdiqlanadi:

<?= $verifyLink ?>
