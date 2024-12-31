<?php

/** @var View $this */

/** @var string $content */

use backend\models\Category;
use backend\models\Social;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\web\View;

AppAsset::register($this);
$socials = Social::find()->orderBy(['id' => SORT_DESC, 'status' => 1])->limit(4)->all();
$categories = Category::find()->limit(15)->where(['status' => '1'])->orderBy(['id' => SORT_DESC])->all();
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?= $this->render('template/_menu', ['socials' => $socials]); ?>
    <?= $this->render('template/_header', ['socials' => $socials]); ?>
    <?= $this->render('template/_hero', ['categories' => $categories]); ?>
    <?= Alert::widget() ?>
    <?= $content ?>

    <!-- Footer Section Begin -->
    <?= $this->render('template/_footer', ['socials' => $socials]); ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
