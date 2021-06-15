<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="posts-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <div class="row" id="OGPost">
        <div id="OGContentA" class="col-md-2">
            <?= $model->author ?>
            <br>
            Posts:<?=$authorPosts->where('username = :username',[':username' => $model->author])->scalar();?>
            <br>
            Comments:<?=$authorComments->where('username = :username',[':username' => $model->author])->scalar();?>
        </div>
        <div id="OGContentC" class="col-md-8">
            <?= $model->content ?>
        </div>

        <div id="OGContentD" class="col-md-2">
            <?= $model->createdAt ?>
        </div>
    </div>

    <?php foreach($comments as $comment): ?>
        <div class="row" id="OGPost">
            <div id="OGContentA" class="col-md-2">
                <?= $comment['author'] ?>
                    <br>
                    Posts:<?=$authorPosts->where('username = :username',[':username' => $comment['author']])->scalar();?>
                    <br>
                    Comments:<?=$authorComments->where('username = :username',[':username' => $comment['author']])->scalar();?>
            </div>
            <div id="OGContentC" class="col-md-8">
                <?= $comment['text'] ?>
            </div>

            <div id="OGContentD" class="col-md-2">
                <?= $comment['createdAt'] ?>
            </div>
        </div>
    <?php endforeach ?>
    <br>
    <p>
    <?php if(Yii::$app->user->identity->banned == 0 ):?>
            <?= Html::a('Make a comment', ['comments/create', 'postId' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php endif ?>
    </p>

</div>
