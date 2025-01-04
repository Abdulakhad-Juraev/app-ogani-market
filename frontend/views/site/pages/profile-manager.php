<?php

use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/** @var View $this */

$this->title = 'Shaxsiy kabinet';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="container mt-5">
    <section class="content-header">
            <div class="row mb-2">
                <div class="col">
                    <h2>Profile</h2>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=Url::to(['/site/index']);?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?=Url::to(['/site/profile']);?>">Profile</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
    </section>
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="profilemanager-default-index">
                <p>
                    <a href="<?= Url::to(['/site/profile-manager-change-login']) ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i>Shaxsiy ma'lumotlarni o'zgartirish
                    </a>
                    <a href="<?= Url::to(['/site/profile-manager-change-password']) ?>" class="btn btn-danger">
                        <i class="fa fa-key"></i> <?= "Parolni o'zgartirish" ?>
                    </a>
                </p>
                <?= DetailView::widget([
                    'model' => Yii::$app->user->identity,
                    'attributes' => [
                        'username:text:Login',
//                        'firstname:text:Ism',
                        [
                            'attribute' => 'firstname',
                            'value' => function ($model) {
                               return $model->userContact->firstname ?? '';
                            },
                        ],
                        [
                            'attribute' => 'lastname',
                            'value' => function ($model) {
                                return $model->userContact->lastname ?? '';
                            },
                        ],
                    ]
                ]) ?>
            </div>
        </div>
    </div>


</div>
