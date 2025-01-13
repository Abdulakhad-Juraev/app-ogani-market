<?php

use common\widgets\Menu;

$menuItems = [
    [
        'label' => "Bosh sahifa",
        'url' => ['/site/index'],
        'icon' => 'home',
    ],
    [
        'label' => "Internet",
        'items' => [
            ['label' => "Ijtimoiy tarmoq", 'url' => ['/social'], 'icon' => 'globe'],
            [
                'label' => "Aloqa",
                'url' => ['/faq'],
                'icon' => 'envelope',
            ],
        ],
        'icon' => 'globe',
    ],

    [
        'label' => "Blog",
        'items' => [
            [
                'label' => "Blog kategoriyasi",
                'url' => ['/blog-manager/blog-category'],
                'icon' => 'vote-yea',
            ],
            [
                'label' => "Blog",
                'url' => ['/blog-manager/blog'],
                'icon' => 'vote-yea',
            ],
            [
                'label' => "Teglar",
                'url' => ['/blog-manager/tags'],
                'icon' => 'vote-yea'
            ],
            [
                'label' => "Blog Tags",
                'url' => ['/blog-manager/blog-tags'],
                'icon' => 'vote-yea',
            ],
        ],
        'icon' => 'vote-yea',
    ],
    [
        'label' => "Chegirmalar",
        'items' => [
            ['label' => "Chegirma", 'url' => ['/discount-manager/discount'], 'icon' => 'percentage'],
            [
                'label' => "Chegirma Super kategoriya",
                'url' => ['/discount-manager/discount-super-category'],
                'icon' => 'percentage',
            ],
        ],
        'icon' => 'percentage',
    ],
    [
        'label' => "Product",
        'items' => [
            [
                'label' => "Super kategoriya",
                'url' => ['/product-manager/super-category'],
                'icon' => 'box-open',
            ],
            [
                'label' => "Mahsulotlar",
                'url' => ['/product-manager/product'],
                'icon' => 'box-open',
            ],
        ],
        'icon' => 'box',
    ],
    [
        'label' => "Order",
        'url' => ['/order-manager/order'],
        'icon' => 'shopping-basket',
    ],
    [
        'label' => "Auth",
        'icon' => 'user-cog',
        'items' => [
            ['label' => "Foydalanuvchilar", 'url' => ['/auth-manager/user'], 'icon' => 'user', 'visible' => Yii::$app->user->can('admin')],
            ['label' => "Ruhsatlar biriktirish", 'url' => ['/auth-manager/auth-assignment'], 'icon' => 'users', 'visible' => Yii::$app->user->can('admin')],
            ['label' => "Ruhsat turlari", 'url' => ['/auth-manager/auth-item'], 'icon' => 'users', 'visible' => Yii::$app->user->can('admin')],
            ['label' => "Q'oshimcha ruhsatlar", 'url' => ['/auth-manager/auth-item-child'], 'icon' => 'users', 'visible' => Yii::$app->user->can('admin')],
        ],
    ],
    [
        'label' => "Sozlamalar",
        'icon' => 'cogs',
        'items' => [
            ['label' => 'Tarjimalar', 'url' => ['/translate-manager'], 'icon' => 'language'],
        ],
    ],
];

// Sidebar Menu
?>

<nav class="mt-2">
    <?= Menu::widget([
        'items' => $menuItems
    ]) ?>
</nav>
