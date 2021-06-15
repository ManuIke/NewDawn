<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wiki */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="wiki-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(!(Yii::$app->user->isGuest)):?>
        <?php if(Yii::$app->user->identity->role == "Editor" || Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Owner"):?>
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
    <?php endif ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'category1',
            'category2',
            'category3',
        ],
    ]) ?>

</div>
