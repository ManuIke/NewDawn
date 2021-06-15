<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$js = <<<EOF

$(document).ready(function(){
    $('table td').click(function(e){
        var id = $(this).closest('tr').attr('id');
        location.href = "/index.php?r=news/view&id="+id;
    });
});

EOF;
$this->registerJs($js);

$this->title = 'News';
?>
<div class="news-index">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>
    <h3 align="center">Welcome to New Dawn's main news page regarding the developments of the games<h3>
    <?= Html::a('Publish news', ['create'], ['class' => 'btn btn-primary']) ?>

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
