<?php

use yii\bootstrap5\Breadcrumbs;

?>
<?=
Breadcrumbs::widget([
    'homeLink' => [
        'label' => '<i class="fas fa-home"></i>' . " Bosh sahifa",
        'url' => Yii::$app->homeUrl,
        'encode' => false,
    ],
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>