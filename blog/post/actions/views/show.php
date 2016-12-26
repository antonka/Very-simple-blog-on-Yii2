<?php

use yii\helpers\Html;
use yii\helpers\Markdown;
use blog\comment\widgets\Comment;

$this->title = $post->title;
$this->params['breadcrumbs'][] = $this->title;

?>

<?= \blog\post\widgets\Toolbar::widget(['postId' => $post->id]); ?>

<div class="site-about"> 
    <p><i><?= Html::encode($post->created_at) ?></i></p>
    <div><?= Markdown::process($post->content) ?></div>
</div>

<?= Comment::widget(['postId' => $post->id]) ?>

