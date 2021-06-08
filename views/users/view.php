<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->username . "'s profile";
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">


    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'posts',
            'comments',
            'role',
            'banned:boolean',
            'banreason',
        ],
        ]) ?>
        <p>
            <?= Html::a('Update profile', ['update', 'id' => $model->Id], ['class' => 'btn btn-success']) ?>
        </p>

</div>
