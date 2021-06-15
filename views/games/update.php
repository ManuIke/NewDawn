<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Games */

$this->title = 'Update Games: ' . $model->name;
?>
<div class="games-update">

    <h1 itemprop="name"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
