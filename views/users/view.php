<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;

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
        <div class="row">
            <?= Html::a('Update profile', ['update', 'id' => $model->Id], ['class' => 'btn btn-success'])?> 
            <?php if(Yii::$app->user->identity->role == "Admin" || Yii::$app->user->identity->role == "Owner"):?>
                <?= Html::a('Unban user', ['unban', 'id' => $model->Id], ['class' => 'btn btn-info']) ?> 
                <?= Html::a('Ban user', ['ban', 'id' => $model->Id], ['class' => 'btn btn-danger'])?> 
                <?php $form = ActiveForm::begin(); ?>
                    <?php Modal::begin([
                        'title' => 'Select role',
                        'toggleButton' => ['label' => 'Change role', 'class' => 'btn btn-primary'],
                    ]);

                    echo  $form->field($model, 'role')->label('Role')->dropDownList(
                        ['User' =>'User',
                        'Editor' =>'Editor',
                        'Moderator' =>'Moderator',
                        'Admin' =>'Admin'],
                        ['selected' => $model->role]
                    );

                    echo Html::submitButton('Save', ['class' => 'btn btn-success']);

                    Modal::end();?>
                <?php ActiveForm::end(); ?>
            <?php endif ?>
        </div>

</div>
