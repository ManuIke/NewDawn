<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Wiki */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="wiki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category1')->label('Category 1')->dropDownList(
            $categories,
            ['selected' => $model->role]
        ) ?>

    <?= $form->field($model, 'category2')->label('Category 2')->dropDownList(
            $categories,
            ['selected' => $model->role]
        ) ?>

    <?= $form->field($model, 'category3')->label('Category 3')->dropDownList(
            $categories,
            ['selected' => $model->role]
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
