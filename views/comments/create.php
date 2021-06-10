<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Comment';
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?php $model->createdAt = date('d-m-Y H:i:s'); ?>
    
    <?= $form->field($model, 'createdAt')->textInput()->hiddenInput()->label(false) ?>

    <?php $model->author = Yii::$app->user->identity->username; ?>
    
    <?= $form->field($model, 'author')->textInput(['maxlength' => true])->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'text')->textarea(['maxlength' => true]) ?>

    <?php $model->parentPost = $parentPost ?>

    <?= $form->field($model, 'parentPost')->textInput()->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
