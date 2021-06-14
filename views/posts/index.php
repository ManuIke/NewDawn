<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';

$js = <<<EOF

$(document).ready(function(){
    $('table td').click(function(e){
        var id = $(this).closest('tr').attr('id');
        location.href = "/index.php?r=posts/view&id="+id;
    });

    $('#chat').click(function(){
        window.open("\..\..\chat\chat.html")
    })
});

EOF;
$this->registerJs($js);
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
            <?= Html::a('Chat with people', ['chat'], ['class' => 'btn btn-primary']) ?>
            <a href="./chat.html">Chat with people</a>
        </p>
</div>
