<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Edit Comment: ' . $model->id;
?>
<div class="comments-update">

    <h1 itemprop="name"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
