<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?php $model->createdAt = date('d-m-Y H:i:s'); ?>

    <?= $form->field($model, 'createdAt')->textInput()->hiddenInput()->label(false) ?>

    <?php $model->comments = 0; ?>

    <?= $form->field($model, 'comments')->textInput()->hiddenInput()->label(false) ?>

    <?php $model->author = Yii::$app->user->identity->username; ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true])->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
