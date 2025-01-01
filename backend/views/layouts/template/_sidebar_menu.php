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

        ],
        'icon' => 'globe',
    ],

    [
        'label' => "Blog",
        'items' => [
            [
                'label' => "Blog kategoriyasi",
                'url' => ['/blog-manager/blog-category'],
                'icon' => 'home',
            ],
            [
                'label' => "Blog",
                'url' => ['/blog-manager/blog'],
                'icon' => 'clipboard-check',
            ],
            [
                'label' => "Teglar",
                'url' => ['/blog-manager/tags'],
                'icon' => 'home'
            ],
            [
                'label' => "Blog Tags",
                'url' => ['/blog-manager/blog-tags'],
                'icon' => 'home',
            ],
        ],
        'icon' => 'globe',
    ],
    [
        'label' => "Допольнителные",
        'items' => [
            ['label' => "Chegirma", 'url' => ['/discount-manager/discount'], 'icon' => 'percentage'],
            [
                'label' => "Discount Super Category",
                'url' => ['/discount-manager/discount-super-category'],
                'icon' => 'percentage',
            ],

        ],
        'icon' => 'globe',
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
        'icon' => 'globe',
    ],
    [
        'label' => "Order",
        'url' => ['/order-manager/order'],
        'icon' => 'home',
    ],

    [
        'label' => "FAQ",
        'url' => ['/faq'],
        'icon' => 'envelope',
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
    [
        'label' => "Categoriyalar",
        'url' => ['/category'],
        'icon' => 'list',
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