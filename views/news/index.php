<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$js = <<<EOF

$(document).ready(function(){
    $('table td').click(function(e){
        let id = $(this).closest('tr').attr('id');
        location.href = "/index.php?r=news/view&id="+id;
    });
});

EOF;
$this->registerJs($js);

$this->title = 'News';
?>
<div class="news-index">

    <img src="https://cdn.discordapp.com/attachments/605185685506490375/851559200953335849/Game_title_-_lavender_dusk.png" id="imagetitle">
    <h3 align="center">Welcome to New Dawn's main news page regarding the developments of the games<h3>
    <?php if(!(Yii::$app->user->isGuest)):?>
        <?php if(Yii::$app->user->identity->role == "Owner"):?>
        <?= Html::a('Publish news', ['create'], ['class' => 'btn btn-primary']) ?>
        <?php endif ?>
    <?php endif ?>

    <table id="news">
        <?php foreach($news as $new): ?>
            <tr id = <?= $new['id']?>>
                <td>
                    <?php $title = $new['title'];
                    echo $title ?>
                </td>
                <td>
                    <?php $date = $new['creationDate'];
                    echo $date ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
