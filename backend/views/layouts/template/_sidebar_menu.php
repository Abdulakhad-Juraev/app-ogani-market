<?php

use common\widgets\Menu;

$menuItems = [
    [
        'label' => "Bosh sahifa",
        'url' => ['/site/index'],
        'icon' => 'home',
    ],
    [
        'label' => "Допольнителные",
        'items' => [
            ['label' => "Ijtimoiy tarmoq", 'url' => ['/social'], 'icon' => 'globe']
        ],
        'icon' => 'globe',
    ],
    [
        'label' => "Discount",
        'url' => ['/discount'],
        'icon' => 'percentage',
    ],
    [
        'label' => "Categoriyalar",
        'url' => ['/category'],
        'icon' => 'list',
    ],
    [
        'label' => "Mahsulotlar",
        'url' => ['/product'],
        'icon' => 'box-open',
    ],
    [
        'label' => "Blog",
        'url' => ['/blog'],
        'icon' => 'clipboard-check',
    ],
    [
        'label' => "Teglar",
        'url' => ['/tags'],
        'icon' => 'home',
    ],
    [
        'label' => "Blog-Kategoriya",
        'url' => ['/blog-category'],
        'icon' => 'home',
    ],
    [
        'label' => "FAQ",
        'url' => ['/faq'],
        'icon' => 'envelope',
    ],
    [
        'label' => "Super_Category",
        'url' => ['/super-category'],
        'icon' => 'envelope',
    ],

    [
        'label' => "Discount Super Category",
        'url' => ['/discount-super-category'],
        'icon' => 'percentage',
    ],
    [
        'label' => "Order",
        'url' => ['/order'],
        'icon' => 'home',
    ],
    [
        'label' => "Order",
        'url' => ['/order-item'],
        'icon' => 'home',
    ],


    [
        'label' => "Blog Tags",
        'url' => ['/blog-tags'],
        'icon' => 'home',
    ],

    [
        'label' => "Auth",
        'icon' => 'home',
        'items' => [
            ['label' => "Auth assignment", 'url' => ['/auth-manager/auth-assignment'], 'icon' => 'home',],
            ['label' => "Auth item", 'url' => ['/auth-manager/auth-item'], 'icon' => 'home',],
            ['label' => "Auth item-child", 'url' => ['/auth-manager/auth-item-child'], 'icon' => 'home',],
        ],
    ],
    [
        'label' => "User",
        'icon' => 'user',
        'items' => [
            ['label' => "Users", 'url' => ['/auth-manager/user'], 'icon' => 'home',],
            ['label' => "User-contact", 'url' => ['/auth-manager/user-contact'], 'icon' => 'home',]
        ],
    ],
    [
        'label' => "Sozlamalar",
        'icon' => 'cogs',
        'items' => [
            ['label' => 'Tarjimalar', 'url' => ['/translate-manager'], 'icon' => 'language'],
        ]
    ],
];

?>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <?= Menu::widget([
        'items' => $menuItems
    ]) ?>
</nav>
<!-- /.sidebar-menu -->