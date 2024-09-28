<?php

use common\widgets\Menu;

$menuItems = [
    [
        'label' => "Bosh sahifa",
        'url' => ['/site/index'],
        'icon' => 'home',
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