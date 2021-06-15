<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-10">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    

        <div class="col-md-2">
            <?= $form->field($model, 'type')->dropdownList([
                'Help' => 'Help',
                'Bug' => 'Bug',
                'Strategy' => 'Strategy',
                'Humor' => 'Humor'
            ]) ?>
        </div>

    
        <?php $model->createdAt = date('Y-m-d H:i:s'); ?>
    
        <?= $form->field($model, 'createdAt')->textInput()->hiddenInput()->label(false) ?>
    
        <?php $model->comments = 0; ?>
    
        <?= $form->field($model, 'comments')->textInput()->hiddenInput()->label(false) ?>
    
        <?php $model->author = Yii::$app->user->identity->username; ?>
    
        <?= $form->field($model, 'author')->textInput(['maxlength' => true])->hiddenInput()->label(false) ?>
    
        <div class="col-md-12">
            <?= $form->field($model, 'content')->textarea(['maxlength' => true]) ?>
        </div>
    
        <?php if(Yii::$app->user->identity->banned == 0 ):?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        <?php endif ?>
    
        <?php ActiveForm::end(); ?>
    </div>

</div>
