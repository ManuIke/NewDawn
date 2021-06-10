<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$js = <<<EOF
    $(document).ready(function(){
        $('#changerole').click(function(){
            window.open("https://www.w3schools.com","_top");
        })
    })
EOF;
$this->registerJs($js);

$this->title = $model->username . "'s profile";
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">


    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'posts',
            'comments',
            'role',
            'banned:boolean',
            'banreason',
        ],
        ]) ?>
        <p>
            <?= Html::a('Update profile', ['update', 'id' => $model->Id], ['class' => 'btn btn-success']) ?>
            <?php if(Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Owner"):?>
                <button id="changerole" class="btn btn-primary">Change role</button>
                <?= Html::a('Unban user', ['unban', 'id' => $model->Id], ['class' => 'btn btn-info']) ?>
                <?= Html::a('Ban user', ['ban', 'id' => $model->Id], ['class' => 'btn btn-danger']) ?>
            <?php endif ?>
        </p>

</div>
