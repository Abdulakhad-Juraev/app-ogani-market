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
            'label' => 'О продукте',
            'url' => ['/auth-manager/user/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Размеры',
            'url' => ['/auth-manager/user/contact', 'id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
    ],
]) ?>