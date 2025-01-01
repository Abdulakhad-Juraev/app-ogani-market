<?php


use backend\models\Order;
use common\components\TabsWidget;
use yii\web\View;

/* @var $this View */
/* @var $model Order */
?>
<?= TabsWidget::widget([
    'items' => [
        [
            'label' => 'Buyurtma haqida',
            'url' => ['/order/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Buyurtma detail',
            'url' => ['/order/order-item', 'order_id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
    ],
]) ?>
