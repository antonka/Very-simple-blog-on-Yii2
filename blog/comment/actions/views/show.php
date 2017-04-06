<?php

use yii\widgets\DetailView;
use blog\comment\helpers\CommentLink;
use blog\comment\helpers\CommentUrl;
use yii\helpers\Html;

$this->title = Yii::t('comment', 'Comment');
$this->params['breadcrumbs'] = [
    CommentLink::showGrid(),
    $this->title,
];

?>

<div>
    <h1><?= $this->title ?></h1>
    <div>
        
        <?= DetailView::widget([
            'model' => $comment,
            'attributes' => [
                'post_id',
                'status',
                'username',
                'email',
                'content',
            ],
        ]); ?>
        
        <?= Html::a(
            Yii::t('comment', 'Publicate'), 
            CommentUrl::publicate($comment),
            ['class' => 'btn btn-primary']
        ); ?>
        
         <?= Html::a(
            Yii::t('app', 'Delete'), 
            CommentUrl::delete($comment),
            ['class' => 'btn btn-primary btn-danger']
        ); ?>
        
    </div>
</div>


