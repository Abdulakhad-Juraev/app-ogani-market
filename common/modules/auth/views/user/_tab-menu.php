<?php


use common\components\TabsWidget;
use common\modules\auth\models\User;
use yii\web\View;

/* @var $this View */
/* @var $model User */

?>
<?= TabsWidget::widget([
    'items' => [
        [
            'label' => 'Foydalanuvchi haqida',
            'url' => ['/auth-manager/user/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Foydalanuvchi kontakt',
            'url' => ['/auth-manager/user/user-contact', 'user_id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
        [
            'label' => 'Foydalanuvchi kitoblari',
            'url' => ['/auth-manager/user/user-products', 'user_id' => $model->id],
            'icon' => 'fas fa-book',
        ],

    ],
]) ?>