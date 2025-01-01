<?php

use common\modules\blog\models\Blog;
use yii\web\View;
use common\components\TabsWidget;

/* @var $this View */
/* @var $model Blog */

?>
<?= TabsWidget::widget([
    'items' => [
        [
            'label' => 'Blog haqida',
            'url' => ['/blog-manager/blog/view', 'id' => $model->id],
            'icon' => 'far fa-question-circle',
        ],
        [
            'label' => 'Teglar',
            'url' => ['/blog-manager/blog/blog-tags', 'blog_id' => $model->id],
            'icon' => 'fas fa-tasks',
        ],
    ],
]) ?>
