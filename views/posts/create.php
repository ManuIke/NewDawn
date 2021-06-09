<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = 'Create Posts';
?>
<div class="posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php var_dump(Yii::$app->user->identity->username)?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
