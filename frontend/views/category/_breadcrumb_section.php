<?php

use backend\models\Category;
use yii\helpers\Url;

/** @var Category $category */


?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?=$category->name;?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= Url::to(['/site']); ?>">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->