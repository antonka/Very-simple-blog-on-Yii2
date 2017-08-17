<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

$this->title = Yii::t('comment', 'Comment');
$this->params['breadcrumbs'] = [
    \blog\comment\actions\ShowGrid::link(),
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
            \blog\comment\actions\Publicate::url($comment->id),
            ['class' => 'btn btn-primary']
        ); ?>
        
        <?= Html::a(
            Yii::t('app', 'Delete'),
            \blog\comment\actions\Delete::url($comment->id),
            ['class' => 'btn btn-primary btn-danger']
        ); ?>
        
    </div>
</div>


