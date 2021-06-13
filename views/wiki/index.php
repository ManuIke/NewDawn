<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WikiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wikis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wiki-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wiki', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'category1',
            'category2',
            //'category3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
