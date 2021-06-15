<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WikiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$js = <<<EOF

$(document).ready(function(){
    $('table td').click(function(e){
        var id = $(this).closest('tr').data('key');
        if(id != undefined){
            location.href = "/index.php?r=wiki/view&id="+id;
        }
    });

});

EOF;
$this->registerJs($js);

$this->title = 'Wiki';
?>
<div class="wiki-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create wiki entry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            'description',
            'category1',
            'category2',
            'category3',

        ],
    ]); ?>


</div>
