<?php

use common\modules\translationmanager\models\SourceMessage;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model SourceMessage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-message-form">

    <?php $form = ActiveForm::begin([
    ]); ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">

                <div class="box-body">

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?php
                      $c = $form->field($model, 'category');
                      if($model->isNewRecord){
                        $c->input('text',['value' => 'app','readOnly'=>true])->label(false);
                      }else{
                        $c->label(false)->hiddenInput();
                      }
                      echo $c;
                      ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <?php
                      $m = $form->field($model, 'message');
                      if($model->isNewRecord){
                        $m->textInput()->label('Kalit soz');
                      }else{
                        $m->label(false)->hiddenInput();
                      }
                      echo $m;
                      ?>
                    </div>
                  </div>
                  <?php foreach (Yii::$app->getModule('translate-manager')->languages as $one): ?>
                    <div class="row">
                      <div class="col-xs-12 col-md-12">
                        <?= $form->field($model, 'languages['.$one.']')->label($one)->textInput() ?>
                      </div>
                    </div>
                  <?php endforeach; ?>

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Qoshish' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
  <?php ActiveForm::end(); ?>
</div>
