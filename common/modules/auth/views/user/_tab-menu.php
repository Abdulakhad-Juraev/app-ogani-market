<?php


use backend\models\Discount;
use common\components\TabsWidget;
use yii\bootstrap4\Tabs;
use yii\web\View;

/* @var $this View */
/* @var $model Discount */

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