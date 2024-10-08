<?

use backend\models\Product;
use common\modules\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model Product */
?>
...
<?php
if ($model->isNewRecord) {
    echo 'Can not upload images for new record';
} else {
    echo GalleryManager::widget(
        [
            'model' => $model,
            'behaviorName' => 'galleryBehavior',
            'apiRoute' => 'product/galleryApi'
        ]
    );
}

//
//foreach($model->getBehavior('galleryBehavior')->getImages() as $image) {
//    echo Html::img($image->getUrl('medium'));
//}
?>
