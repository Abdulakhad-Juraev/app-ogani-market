<?php

/* @var $this View */
/* @var $model Discount */

use common\components\TabsWidget;
use common\modules\discount\models\Discount;
use yii\web\View;

?>
<?= TabsWidget::widget([
    'items' => [
        [
            'label' => 'Chegirma haqida',
            'url' => ['/discount-manager/discount/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Super kategoriyalar',
            'url' => ['/discount-manager/discount/super-categories', 'id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
    ],
]) ?>
