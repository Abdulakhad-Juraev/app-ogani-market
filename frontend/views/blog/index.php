<?php

use yii\data\ActiveDataProvider;
use common\modules\blog\models\Blog;
use common\modules\blog\models\Tags;
use common\modules\blog\models\BlogCategory;

/** @var Tags[] $tags */
/** @var Blog[] $blogsRecent */
/** @var Blog[] $blogsRecent */
/** @var BlogCategory[] $blogCategories */
/** @var ActiveDataProvider $dataProvider */

?>

<?= $this->render('_blog-content', [
    'dataProvider' => $dataProvider,
    'blogsRecent' => $blogsRecent,
    'tags' => $tags,
    'blogCategories' => $blogCategories
]) ?>
