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
                'label' => "Chegirma Super kategoriya",
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
        'label' => "Auth",
        'icon' => 'home',
        'items' => [
            ['label' => "Ruhsatlar biriktirish", 'url' => ['/auth-manager/auth-assignment'], 'icon' => 'home',],
            ['label' => "Ruhsat turlari ", 'url' => ['/auth-manager/auth-item'], 'icon' => 'home',],
            ['label' => "Q'oshimcha ruhsatlar", 'url' => ['/auth-manager/auth-item-child'], 'icon' => 'home',],
            ['label' => "Foydalanuvchilar", 'url' => ['/auth-manager/user'], 'icon' => 'home',],
//            ['label' => "Profile Manager", 'url' => ['/profile-manager/'], 'icon' => 'home',],
        ],
    ],
    [
        'label' => "Sozlamalar",
        'icon' => 'cogs',
        'items' => [

            ['label' => 'Tarjimalar', 'url' => ['/translate-manager'], 'icon' => 'language'],
        ]
    ],
//    [
//        'label' => "Categoriyalar",
//        'url' => ['/category'],
//        'icon' => 'list',
//    ],
//            ['label' => "User-contact", 'url' => ['/auth-manager/user-contact'], 'icon' => 'home',]
];

?>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <?= Menu::widget([
        'items' => $menuItems
    ]) ?>
</nav>
<!-- /.sidebar-menu -->