<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
?>
<div class="posts-index">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    
    <table class="posts">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Replies</th>
        </tr>
        <?php foreach($posts as $data): ?>
            <tr id = <?= $data['id']?>>
                <td><?= $data['title']?></td>
                <td><?= $data['author']?></td>
                <td><?= $data['createdAt']?></td>
                <td><?= $data['comments']?></td>
            </tr>
            <?php endforeach ?>
        </table>
        <br>
        <p>
            <?= Html::a('Make a post', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
</div>
