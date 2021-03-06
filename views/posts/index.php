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
        <?php if(Yii::$app->user->identity->banned == 0 ):?>
            <?= Html::a('Make a post', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif ?>
            <?= Html::a('Chat with people', 'https://newdawnchat.herokuapp.com/chat.html', ['class' => 'btn btn-primary']) ?>
        </p>
</div>
