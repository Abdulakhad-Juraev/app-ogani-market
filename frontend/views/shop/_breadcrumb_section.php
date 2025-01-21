<?php

use yii\helpers\Url;

/** @var $data */

?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/template/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app', $data); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= Url::to(['/site/index']); ?>"><?= Yii::t('app', 'home'); ?></a>
                        <span><?= Yii::t('app', $data); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
