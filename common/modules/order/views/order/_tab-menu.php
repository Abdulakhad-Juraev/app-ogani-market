<?php


use common\components\TabsWidget;
use common\modules\order\model\Order;
use yii\web\View;

/* @var $this View */
/* @var $model Order */
?>
<?= TabsWidget::widget([
    'items' => [
        [
            'label' => 'Buyurtma haqida',
            'url' => ['/order-manager/order/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Buyurtma detail',
            'url' => ['/order-manager/order/order-item', 'order_id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
    ],
]) ?>
