<?php

/* @var $this View */
/* @var $model Discount */

use yii\web\View;
use backend\models\Discount;
use common\components\TabsWidget;

?>
<?= TabsWidget::widget([
    'items' => [
        [
            'label' => 'О продукте',
            'url' => ['/discount/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Размеры',
            'url' => ['/discount/test', 'id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
    ],
]) ?>
