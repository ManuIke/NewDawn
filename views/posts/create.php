<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Create Posts';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-10">
            <?= $form->field($model, 'title')->label('Title')->input('text'); ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'type')->label('Type')->dropDownList([
                0=>'Info',
                1=>'Discussion',
                2=>'Bug',
                3=>'Strategy'
            ]); ?>
        </div>
    </div>

    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
