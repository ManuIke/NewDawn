<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row" id="OGPost">
        <div class="col-md-1" id="OGContent">
            <?= $model->author ?>
        </div>
        <div class="col-md-9" id="OGContent">
            <?= $model->content ?>
        </div>

        <div class="col-md-2" id="OGContent">
            <?= $model->createdAt ?>
        </div>
    </div>

</div>
