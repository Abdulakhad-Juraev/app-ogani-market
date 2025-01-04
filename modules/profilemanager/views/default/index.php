<?php

use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/** @var View $this */

$this->title = 'Shaxsiy kabinet';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="card card-outline card-primary">
    <div class="card-body">
        <div class="profilemanager-default-index">
            <h1><?= $this->title ?></h1>
            <p>
                <a href="<?= Url::to(['change-login']) ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>Shaxsiy ma'lumotlarni o'zgartirish
                </a>
                <a href="<?= Url::to(['change-password']) ?>" class="btn btn-danger">
                    <i class="fa fa-key"></i> <?= "Parolni o'zgartirish" ?>
                </a>
            </p>
            <?= DetailView::widget([
                'model' => Yii::$app->user->identity,
                'attributes' => [
                    'username:text:Login',
//                    'firstname:text:Ism',
//                    'lastname:text:Familiya',
                ]
            ]) ?>
        </div>
    </div>
</div>


