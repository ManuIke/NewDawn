<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->identity->banned == 0 ):?>
            <?= Html::a('Make a comment', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text',
            'parentPost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
