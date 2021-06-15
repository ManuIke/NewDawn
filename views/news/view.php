<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <div id="newsContent">
        <?= $model->content ?>
    </div>
    <?php if (Yii::$app->user->identity->role == "Owner") :?>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif ?>

</div>
